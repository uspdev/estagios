<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Estagio;
use Illuminate\Support\Facades\Gate;
use Auth;

class EstagioWorkflowController extends Controller
{
    /* Métodos para workflow */
    
    public function enviar_para_analise_tecnica(Estagio $estagio){
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'enviar_para_analise_tecnica');
        $estagio->save();
        return redirect("/estagios/{$estagio->id}");
    }

    public function analise_tecnica(Request $request, Estagio $estagio){
        $estagio->analise_tecnica = $request->analise_tecnica;
        $estagio->analise_tecnica_user_id = Auth::user()->id;
        $estagio->save();

        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,$request->analise_tecnica_action);
        $estagio->save();
        return redirect("/estagios/{$estagio->id}");  
    }

    public function deferimento_analise_academica(Estagio $estagio) {
            $workflow = $estagio->workflow_get();
            $workflow->apply($estagio,'deferimento_analise_academica');
            $estagio->save();
            return redirect("/estagios/{$estagio->id}");       
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
