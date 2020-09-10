<?php
namespace App\Http\Controllers;

use App\Estagio;
use App\User;
use Auth;

use Uspdev\Replicado\Pessoa;
use App\Http\Requests\EstagioRequest;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Gate;

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
        $validated['cnpj'] = Auth::user()->cnpj;
        $validated['status'] = 'em_elaboracao';           
        $estagio = Estagio::create($validated);        
        return redirect("estagios/{$estagio->id}");
    }

    /* Será feito via workflow
    public function edit(Estagio $estagio) {
        if (Gate::allows('admin') | Gate::allows('empresa',$estagio->cnpj)) {
            return view('estagios.edit')->with('estagio',$estagio);
        }
        abort(403, 'Access denied');
    }

    public function update(EstagioRequest $request, Estagio $estagio)
    {
        $this->authorize('admin_ou_empresa', $estagio->cnpj);
        $validated = $request->validated();                  
        $estagio->update($validated); 
        return redirect("estagios/{$estagio->id}");
    }
    */

    public function destroy(Estagio $estagio){
        if (Gate::allows('admin') | Gate::allows('empresa',$estagio->cnpj)) {
            $estagio->delete();
            return redirect('/estagios');
        }
        abort(403, 'Access denied');
    } 

    public function parecerMerito(Estagio $estagio){
        $this->authorize('parecerista');

        $estagios = Estagio::where('status', "em_analise_academica")
                      ->where('numparecerista',Auth::user()->codpes)->get();


        return view('estagios.parecer_merito')->with([
            'estagios' => $estagios,
        ]);
    }

    public function meusPareceres(Estagio $estagio){
        $this->authorize('parecerista');

        $estagios = Estagio::where('status',"!=", "em_analise_academica")
                      ->where('numparecerista',Auth::user()->codpes)->get();


        return view('estagios.parecer_merito')->with([
            'estagios' => $estagios,
        ]);
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

}