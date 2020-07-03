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
        return redirect("estagios/{$estagio->id}");
    }

    public function analise_tecnica(Request $request, Estagio $estagio){

        /* Quando indeferir, tornar obrigatório o campo analise_tecnica */
        if($request->analise_tecnica_action == 'indeferimento_analise_tecnica'){
            $request->validate([
                'analise_tecnica' => 'required',
            ]);
        }

        $estagio->analise_tecnica = $request->analise_tecnica;
        $estagio->analise_tecnica_user_id = Auth::user()->id;
        $estagio->save();
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,$request->analise_tecnica_action);
        $estagio->save();
        return redirect("/estagios/{$estagio->id}");  
    }

    public function analise_academica(Request $request, Estagio $estagio){

        $request->validate([
            'analise_academica' => 'required',
        ]);

        $estagio->analise_academica = $request->analise_academica;
        $estagio->analise_academica_user_id = Auth::user()->id;
        $estagio->save();
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,$request->analise_academica_action);
        $estagio->save();
        return redirect("/estagios/{$estagio->id}");  
    }

    public function renovacao(Estagio $estagio) {
        
        $renovacao = $estagio->replicate();
        $renovacao->push();

        if(empty($estagio->renovacao_parent_id)){
            $renovacao->renovacao_parent_id = $estagio->id;
        }

        $workflow = $renovacao->workflow_get();
        $workflow->apply($renovacao,'renovacao');
        $renovacao->save();
        return redirect("estagios/{$renovacao->id}");     
    }   

    public function iniciar_alteracao(Estagio $estagio) {
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'iniciar_alteracao');
        $estagio->save();
        return redirect("estagios/{$estagio->id}");           

    }
    
    public function rescisao(Request $request, Estagio $estagio){
        $estagio->rescisao_motivo = $request->rescisao_motivo; 
   
        $estagio->save();
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'rescisao_do_estagio');
        $estagio->save();
        return redirect("/estagios/{$estagio->id}"); 
    } 
    
    public function analise_alteracao(Request $request, Estagio $estagio){
        $estagio->analise_alteracao = $request->analise_alteracao;
        $estagio->analise_alteracao_user_id = Auth::user()->id;        
        $estagio->save();
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'enviar_analise_tecnica_alteracao');
        $estagio->save();
        return redirect("/estagios/{$estagio->id}"); 
    } 

    public function analise_alteracao_tecnica(Request $request, Estagio $estagio){
        $estagio->analise_alteracao = $request->analise_alteracao;
        $estagio->analise_alteracao_user_id = Auth::user()->id;        
        $estagio->save();
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'enviar_analise_tecnica_alteracao');
        $estagio->save();
        return redirect("/estagios/{$estagio->id}");         
    }

    public function deferimento_analise_tecnica_alteracao(Estagio $estagio) {
        $workflow = $estagio->workflow_get();
        $workflow->apply($estagio,'deferimento_analise_tecnica_alteracao');
        $estagio->save();
        return redirect("estagios/{$estagio->id}");       
    }   


    public function indeferimento_analise_tecnica_alteracao(Estagio $estagio) {
        $workflow = $estagio->workflow_get();
        $request->validate([
            'analise_academica' => 'required',
        ]);
        $workflow->apply($estagio,'indeferimento_analise_tecnica_alteracao');
        $estagio->save();
        return redirect("estagios/{$estagio->id}");           

    } 

    public function reiniciar_estagio(Estagio $estagio) {
        $reiniciar_estagio = $estagio->replicate();
        $reiniciar_estagio->push();
        $workflow = $reiniciar_estagio->workflow_get();
        $workflow->apply($reiniciar_estagio,'reiniciar_estagio');
        $reiniciar_estagio->save();
        return redirect("estagios/{$reiniciar_estagio->id}");     
    } 

}
