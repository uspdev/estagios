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
            if(isset($request->busca)) {
                $estagios = Estagio::where('numero_usp','LIKE',"%{$request->busca}%")->paginate(10);
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

        return view('estagios.index')->with('estagios',$estagios);
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

    /* Métodos para workflow */
    
    public function enviar_para_analise_tecnica(Estagio $estagio){
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'enviar_para_analise_tecnica');
        $estagio->save();
        return redirect("estagios/{$estagio->id}");
    }
//    
    public function deferimento_analise_tecnica(Estagio $estagio) {
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'deferimento_analise_tecnica');
        $estagio->save();
        return redirect("estagios/{$estagio->id}");       
    }

    public function indeferimento_analise_tecnica(Estagio $estagio) {
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'indeferimento_analise_tecnica');
        $estagio->save();
        return redirect("estagios/{$estagio->id}");    
    }
//
    public function deferimento_analise_academica(Estagio $estagio) {
            $workflow = $estagio->workflow_get();
            $workflow->apply($estagio,'deferimento_analise_academica');
            $estagio->save();
            return redirect("estagios/{$estagio->id}");       
    }
    
    public function indeferimento_analise_academica(Estagio $estagio) {
            $workflow = $estagio->workflow_get();
            $workflow->apply($estagio,'indeferimento_analise_academica');
            $estagio->save();
            return redirect("estagios/{$estagio->id}");           

    }
//
    public function renovacao(Estagio $estagio) {
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'renovacao');
        $estagio->save();
        return redirect("estagios/{$estagio->id}");       
    }   

    public function iniciar_alteracao(Estagio $estagio) {
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'iniciar_alteracao');
        $estagio->save();
        return redirect("estagios/{$estagio->id}");           

    }    

//
    public function enviar_analise_tecnica_alteracao(Estagio $estagio) {
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'enviar_analise_tecnica_alteracao');
        $estagio->save();
        return redirect("estagios/{$estagio->id}");       
    } 

//
    public function deferimento_analise_tecnica_alteracao(Estagio $estagio) {
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'deferimento_analise_tecnica_alteracao');
        $estagio->save();
        return redirect("estagios/{$estagio->id}");       
    }   

    public function indeferimento_analise_tecnica_alteracao(Estagio $estagio) {
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'indeferimento_analise_tecnica_alteracao');
        $estagio->save();
        return redirect("estagios/{$estagio->id}");           

    }  
}