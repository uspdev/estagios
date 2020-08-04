<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EstagioRequest;
use App\Estagio;
use Illuminate\Support\Facades\Gate;
use Auth;

class EstagioController extends Controller
{
    public function index(Request $request){

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
        $this->authorize('admin_ou_empresa', $estagio->cnpj);
        return view('estagios.show')->with('estagio',$estagio);
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

    public function edit(Estagio $estagio) {   

        $this->authorize('admin_ou_empresa', $estagio->cnpj);
        return view ('estagios.edit')->with('estagio',$estagio);
    }

    public function update(EstagioRequest $request, Estagio $estagio)
    {

        $this->authorize('admin_ou_empresa', $estagio->cnpj);

        $validated = $request->validated();                  
        $estagio->update($validated); 
        return redirect("estagios/{$estagio->id}");
    }

    public function destroy(Estagio $estagio){

        $this->authorize('admin_ou_empresa', $estagio->cnpj);

        $estagio->delete();
        return redirect('/estagios');
    } 

}