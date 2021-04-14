<?php
namespace App\Http\Controllers;

use App\Models\Estagio;
use App\Models\User;
use Auth;

use Uspdev\Replicado\Pessoa;
use App\Http\Requests\EstagioRequest;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Gate;
use App\Utils\ReplicadoUtils;

class EstagioController extends Controller
{
    public function index(Request $request,Estagio $estagio){

        if (Gate::allows('admin')) {

            if ($request->buscastatus != null && $request->busca != null){

                $estagios = Estagio::where('numero_usp','LIKE',"%{$request->busca}%")
                -> where('status', $request->buscastatus)->paginate(10);
                
            } else if(isset($request->busca)) {
                $estagios = Estagio::where('numero_usp','LIKE',"%{$request->busca}%")->paginate(10);
                }
                
                else if(isset($request->buscastatus)){
                if ($request->buscastatus != null){
                    $estagios = Estagio::where('status', $request->buscastatus)->paginate(10);
                }

            } else {

            $estagios = Estagio::paginate(10);

            
            }

        } else if (Gate::allows('empresa')){
            $cnpj = Auth::user()->cnpj;
            $estagios = Estagio::where('cnpj',$cnpj)->paginate(10);

        } else {
            $request->session()->flash('alert-danger','Usuário sem permissão');
            return redirect('/');
        }

        return view('estagios.index')->with([
            'estagios' => $estagios,
            'estagio' => new Estagio()
        ]);

    }

    public function show(Estagio $estagio)
    {
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$estagio->cnpj)) {
            return view('estagios.show')->with('estagio',$estagio);
        }
        abort(403, 'Access denied');
    }    

    public function create(){
        $this->authorize('empresa');
        return view('estagios.create')->with('estagio',new Estagio);
    }

    public function store(EstagioRequest $request)
    {
        $this->authorize('empresa');
        $validated = $request->validated();
        $validated['status'] = 'em_elaboracao';           
        $estagio = Estagio::create($validated);        
        return redirect("estagios/{$estagio->id}");
    }

    public function destroy(Estagio $estagio){
        if (Gate::allows('admin') | Gate::allows('empresa',$estagio->cnpj)) {
            $estagio->delete();
            return redirect('/estagios');
        }
        abort(403, 'Access denied');
    } 

    public function alterarParecerista(Request $request, Estagio $estagio){
        if (Gate::allows('admin')) {
        $estagio->numparecerista = $request->numparecerista;
        $estagio->save();

    } else {
        request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
    }
        return redirect("/estagios/{$estagio->id}");
    }

    /* Api para entregar dados do(a) aluno(a) no blade */
    public function info(Request $request)
    {
        $this->authorize('empresa');
        if(empty($request->codpes)){
            return response('Pessoa não encontrada');
        }

        if(!is_int((int)$request->codpes)){
            return response('Pessoa não encontrada');
        }

        if(strlen($request->codpes) < 6){
            return response('Pessoa não encontrada');
        }

        $info = Pessoa::nomeCompleto($request->codpes);
        if($info) {
            $info .= ' - Período do curso: ' . ReplicadoUtils::periodo($request->codpes);
            return response($info);
        } else {
            return response('Pessoa não encontrada');
        } 
    }

}