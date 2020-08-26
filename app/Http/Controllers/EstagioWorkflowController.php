<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EstagioRequest;

use App\Estagio;
use Illuminate\Support\Facades\Gate;
use Auth;

class EstagioWorkflowController extends Controller
{

    #Funções Análise Técnica
    
    public function enviar_para_analise_tecnica(EstagioRequest $request, Estagio $estagio){

        if ( Gate::allows('empresa',$estagio->cnpj) | Gate::allows('admin') ) {
            $validated = $request->validated();                  
            $estagio->update($validated); 
           
            if($request->enviar_para_analise_tecnica=="enviar_para_analise_tecnica"){
                $workflow = $estagio->workflow_get();
                $workflow->apply($estagio,'enviar_para_analise_tecnica');
                $estagio->save();
            }
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }

        return redirect("/estagios/{$estagio->id}");
    }

    public function analise_tecnica(Request $request, Estagio $estagio){

        if (Gate::allows('admin')) {
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
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}");  
    }

    #Funções Análise Acadêmica

    public function analise_academica(Request $request, Estagio $estagio){

        if (Gate::allows('parecerista')) {

            $request->validate([
                'analise_academica' => 'required',
            ]);
            $estagio->analise_academica = $request->analise_academica;
            $estagio->analise_academica_user_id = Auth::user()->id;
            $estagio->save();
            $workflow = $estagio->workflow_get();
            $workflow->apply($estagio,$request->analise_academica_action);
            $estagio->save();
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}");  
    }

    #Funções Concluido

    public function renovacao(Request $request, Estagio $estagio) {

        if ( Gate::allows('empresa',$estagio->cnpj) | Gate::allows('admin')) {

            $request->validate([
                'renovacao_justificativa' => 'required',
            ]);      
            $renovacao = $estagio->replicate();
            $renovacao->push();

            if(empty($estagio->renovacao_parent_id)){
                $renovacao->renovacao_parent_id = $estagio->id;
            }
            $estagio->analise_tecnica = null;
            $estagio->analise_academica = null;
            $estagio->analise_alteracao = null;
            $estagio->save();        
            $workflow = $renovacao->workflow_get();
            $workflow->apply($renovacao,'renovacao');       
            $renovacao->save();
            $estagio->save();
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }            
        return redirect("estagios/{$renovacao->id}");     
    }   
     
    public function rescisao(Request $request, Estagio $estagio){
            
        if ( Gate::allows('empresa',$estagio->cnpj) | Gate::allows('admin')) {
            $request->validate([
                'rescisao_motivo' => 'required',
                'rescisao_data' => 'required',
            ]);
            
            $estagio->rescisao_motivo = $request->rescisao_motivo;       
            $estagio->save();
            $workflow = $estagio->workflow_get();
            $workflow->apply($estagio,'rescisao_do_estagio');
            $estagio->save();
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}"); 
    } 

    public function iniciar_alteracao(Estagio $estagio) {

        if (Gate::allows('empresa',$estagio->cnpj)) {
            $workflow = $estagio->workflow_get();
            $workflow->apply($estagio,'iniciar_alteracao');
            $estagio->save();
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("estagios/{$estagio->id}");           

    }

    #Funções Alteração

    public function enviar_alteracao(EstagioRequest $request, Estagio $estagio){    
            
        if (Gate::allows('empresa',$estagio->cnpj)) {
            $validated = $request->validated();                  
            $estagio->update($validated); 
            $estagio->alteracao = $request->alteracao;
            $estagio->save();

            if($request->enviar_analise_tecnica_alteracao == 'enviar_analise_tecnica_alteracao'){
                $request->validate([
                    'alteracao' => 'required'
                ]);
                $estagio->alteracao = $request->alteracao;
                $estagio->save();
                $workflow = $estagio->workflow_get();
                $workflow->apply($estagio,'enviar_analise_tecnica_alteracao');
                $estagio->save();
            }    
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}"); 
    } 

    #Funções Análise da Alteração
 
    public function analise_tecnica_alteracao(Request $request, Estagio $estagio){

        if (Gate::allows('admin')) {
            if($request->analise_tecnica_alteracao_action == 'indeferimento_analise_tecnica_alteracao'){
                $request->validate([
                    'analise_alteracao' => 'required',
                ]);
            }
            $estagio->analise_alteracao = $request->analise_alteracao;
            $estagio->analise_alteracao_user_id = Auth::user()->id;
            $estagio->save();
            $workflow = $estagio->workflow_get();
            $workflow->apply($estagio,$request->analise_tecnica_alteracao_action);
            $estagio->save();
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}");  
    }

    #FUNÇÕES TEMPORÁRIAS

    public function reiniciar_estagio(Estagio $estagio) {
        if (Gate::allows('empresa',$estagio->cnpj) | Gate::allows('admin')) {
            $reiniciar_estagio = $estagio->replicate();
            $reiniciar_estagio->push();
            $workflow = $reiniciar_estagio->workflow_get();
            $workflow->apply($reiniciar_estagio,'reiniciar_estagio');
            $reiniciar_estagio->save();
            return redirect("estagios/{$reiniciar_estagio->id}");  
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("estagios/{$estagio->id}");  
    } 

}
