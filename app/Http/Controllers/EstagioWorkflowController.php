<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EstagioRequest;
use App\Http\Requests\EdicaoRequest;

use Auth;
use PDF;
use App\Models\Estagio;
use App\Models\User;
use App\Models\File;
use App\Models\Aditivo;
use Illuminate\Support\Facades\Gate;
use Uspdev\Replicado\Pessoa;
use App\Mail\enviar_para_analise_tecnica_mail;
use App\Mail\enviar_para_analise_tecnica_renovacao_mail;
use App\Mail\assinatura_mail;
use App\Mail\alteracao_mail;
use App\Mail\alteracao_empresa_mail;
use App\Mail\alteracao_indeferida_mail;
use App\Mail\enviar_analise_academica_mail;
use App\Mail\alteracao_pendente_empresa_mail;
use App\Mail\justificativa_analise_tecnica;
use App\Mail\GerarRescisaoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class EstagioWorkflowController extends Controller
{

    #Funções Análise Técnica

    public function enviar_para_analise_tecnica(EstagioRequest $request, Estagio $estagio){

        if ( Gate::allows('empresa',$estagio->cnpj) | Gate::allows('admin') ) {
            $validated = $request->validated();
            $estagio->update($validated);

            if($request->enviar_para_analise_tecnica=="enviar_para_analise_tecnica"){
                $estagio->last_status = 'em_elaboracao';
                $estagio->status = 'em_analise_tecnica';
                $estagio->save();
            }

            if($request->enviar_para_analise_tecnica=="apenas_salvar_renovacao"){
                $estagio->alteracoesadcionais = $request->alteracoesadcionais;
                $estagio->save();
            }

            if($request->enviar_para_analise_tecnica=="enviar_para_analise_tecnica_renovacao"){
                $estagio->alteracoesadcionais = $request->alteracoesadcionais;
                $estagio->save();
                $estagio->last_status = 'em_elaboracao';
                $estagio->status = 'em_analise_tecnica';
                $estagio->save();
            }

        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }

        return redirect("/estagios/{$estagio->id}");
    }

    public function analise_tecnica(Request $request, Estagio $estagio){

        if (Gate::allows('admin')) {

            $estagio->analise_tecnica = $request->analise_tecnica;
            $estagio->analise_tecnica_user_id = Auth::user()->numero_usp;
            $estagio->save();

            if($request->analise_tecnica_action == 'concluir') {
                $request->validate([
                    'analise_tecnica' => 'required',
                ]);
                if(is_null($estagio->analise_academica)){
                    request()->session()->flash('alert-danger','Não existe parecer de mérito para esse estágio. Não é possível concluir.');
                    return redirect("/estagios/{$estagio->id}");
                }
                $estagio->last_status = $estagio->status;
                $estagio->status = 'concluido';
                $estagio->save();
                return redirect("/estagios/{$estagio->id}");
            }

            if($request->analise_tecnica_action == 'enviar_assinatura') {
                $request->validate([
                    'analise_tecnica' => 'required',
                ]);
                $estagio->last_status = $estagio->status;
                $estagio->status = 'assinatura';
                $estagio->save();
                Mail::queue(new assinatura_mail($estagio));
                return redirect("/estagios/{$estagio->id}");
            }

            if($request->analise_tecnica_action == 'indeferimento_analise_tecnica'){
                $request->validate([
                    'analise_tecnica' => 'required',
                ]);
                $estagio->last_status = $estagio->status;
                $estagio->status = 'em_elaboracao';
                $estagio->save();
                Mail::queue(new justificativa_analise_tecnica($estagio));
                return redirect("/estagios/{$estagio->id}");
            } else {
                if($estagio->numparecerista){
                    $estagio->last_status = $estagio->status;
                    $estagio->status = 'em_analise_academica';
                    $estagio->save();
                } else {
                    request()->session()->flash('alert-danger','Não enviado para parecer de mérito! Informe o parecerista!');
                }
            }

        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}");
    }

    public function mover_analise_tecnica(Request $request, Estagio $estagio){

        if (Gate::allows('admin')) {
            $estagio->last_status = $estagio->status;
            $estagio->status = 'em_analise_tecnica';
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
                'atividadespertinentes' => 'required',
                'desempenhoacademico' => 'required',
                'horariocompativel' => 'required|max:255',
                'atividadesjustificativa'=> 'required',
                'analise_academica'=> 'required',
                'tipodeferimento'=> 'required',
                'condicaodeferimento'=> 'required_if:tipodeferimento,==,Deferido com Restrição'
            ]);
            $estagio->analise_academica = $request->analise_academica;
            $estagio->horariocompativel = $request->horariocompativel;
            $estagio->desempenhoacademico = $request->desempenhoacademico;
            $estagio->atividadespertinentes = $request->atividadespertinentes;
            $estagio->atividadesjustificativa = $request->atividadesjustificativa;
            $estagio->tipodeferimento = $request->tipodeferimento;
            $estagio->condicaodeferimento = $request->condicaodeferimento;
            $estagio->analise_academica_user_id = Auth::user()->id;
            $estagio->numparecerista = User::find($estagio->analise_academica_user_id)->codpes;
            $estagio->last_status = $estagio->status;
            $estagio->status = 'em_analise_tecnica';
            $estagio->save();
            Mail::queue(new enviar_analise_academica_mail($estagio));
            request()->session()->flash('alert-info','Parecer incluído com sucesso! Estágio enviado para o setor de graduação');
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}");
    }

    public function editar_analise_academica(Request $request, Estagio $estagio){

        if (Gate::allows('parecerista')) {
            $estagio->last_status = $estagio->status;
            $estagio->status = 'em_analise_academica';
            $estagio->save();
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}");
    }

    public function voltar_analise_academica(Request $request, Estagio $estagio){

        if (Gate::allows('admin')) {
            $estagio->last_status = $estagio->status;
            $estagio->status = 'em_analise_tecnica';
            $estagio->save();
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}");
    }

    #Funções Assinatura

    public function retornar_assinatura(Request $request, Estagio $estagio){

        if (Gate::allows('admin')) {
            $estagio->last_status = $estagio->status;
            $estagio->status = 'em_analise_tecnica';
            $estagio->save();
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}");
    }

    #Funções Concluido

    public function renovacao(Request $request, Estagio $estagio, File $file) {

        if ( Gate::allows('empresa',$estagio->cnpj) || Gate::allows('admin')) {

            $request->validate([
                'relatorio' => 'required|file|max:12000|mimes:pdf',
                'estagio_id' => 'required|integer|exists:estagios,id',
            ],
            [
                'relatorio.required' => 'O relatório é requerido.',
                'estagio_id.required' => 'O código do estágio é requerido.'
            ]);

            try {
                DB::beginTransaction();
                $renovacao = $estagio->replicate([
                    'analise_tecnica',
                    'horariocompativel',
                    'desempenhoacademico',
                    'atividadespertinentes',
                    'atividadesjustificativa',
                    'tipodeferimento',
                    'condicaodeferimento',
                    'analise_academica',
                    'analise_academica_user_id',
                    'avaliacao_empresa',
                    'avaliacaodescricao',
                ])->fill([
                    'renovacao_parent_id' => $estagio->id,
                    'status' => 'em_elaboracao',
                ]);
                $renovacao->save();

                $file = new File;
                $file->estagio_id = $renovacao->id;
                $file->original_name = 'Relatório';
                $file->path = $request->file('relatorio')->store('.');
                $file->user_id = Auth::user()->id;
                $file->tipo_documento = 'Relatorio';
                $file->save();
                DB::commit();
                return redirect("estagios/{$renovacao->id}")->with('alert-info', 'Renovação efetuada com sucesso.');
            } catch(\Exception $e) {
                DB::rollBack();
                return back()->with('alert-danger', 'Ocorreu um erro na renovação: ' . $e->getMessage());
            }
        } else {
            return back()->with('alert-danger', 'Sem permissão para executar ação.' . $e->getMessage());
        }
    }

    public function rescisao(Request $request, Estagio $estagio){

        if ( Gate::allows('empresa',$estagio->cnpj) | Gate::allows('admin')) {

            $request->validate([
                'rescisao_motivo' => 'required',
                'rescisao_data' => 'required|data',
            ]);
            $estagio->rescisao_motivo = $request->rescisao_motivo;
            $estagio->rescisao_data = implode('-',array_reverse(explode('/',$request->rescisao_data)));
            $estagio->last_status = $estagio->status;
            $estagio->save();
            $estagio->status = 'rescisao';
            $estagio->save();
            Mail::queue(new GerarRescisaoMail($estagio));
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}");
    }

    public function iniciar_alteracao(Estagio $estagio) {

        if (Gate::allows('empresa',$estagio->cnpj)) {
            $estagio->last_status = $estagio->status;
            $estagio->status = 'em_alteracao';
            $estagio->save();
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("estagios/{$estagio->id}");

    }

    #Funções Alteração

    public function enviar_alteracao(Request $request, Estagio $estagio){

        if (Gate::allows('empresa',$estagio->cnpj)) {

            $aditivo = new Aditivo;
            $aditivo->alteracao = $request->alteracao;
            $aditivo->estagio_id = $estagio->id;
            $aditivo->aprovado_graduacao = 0;
            $aditivo->aprovado_parecerista = 0;
            $aditivo->save();
            $estagio->last_status = $estagio->status;
            $estagio->status = 'em_analise_tecnica';
            $estagio->save();
            Mail::queue(new alteracao_pendente_empresa_mail($estagio));
            request()->session()->flash('alert-info', 'Enviado para análise do setor de graduação');
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("estagios/{$estagio->id}");
    }

    public function voltar_aditivo(Request $request, Estagio $estagio){

        if (Gate::allows('empresa',$estagio->cnpj) | Gate::allows('admin')) {
            $estagio->last_status = $estagio->status;
            $estagio->status = 'concluido';
            $estagio->save();
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}");
    }


    public function analise_alteracao(Request $request, Aditivo $aditivo, Estagio $estagio){

        if (Gate::allows('admin') | Gate::allows('parecerista')) {

            //caso de aditivo deferido diretamente
            if($request->analise_alteracao_action == 'deferir_alteracao') {
                $estagio = Estagio::find($aditivo->estagio_id);
                $aditivo->comentario_graduacao = $request->comentario_graduacao;
                $aditivo->aprovado_graduacao = 1;
                $aditivo->aprovado_parecerista = 1;
                $aditivo->save();
                Mail::queue(new alteracao_empresa_mail($estagio));
                request()->session()->flash('alert-info', 'Aditivo deferido com sucesso');
            }

            //caso de aditivo indeferido diretamente
            if($request->analise_alteracao_action == 'indeferir_alteracao') {
                $request->validate([
                    'comentario_graduacao' => 'required',
                ]);
                $estagio = Estagio::find($aditivo->estagio_id);
                $aditivo->comentario_graduacao = $request->comentario_graduacao;
                $aditivo->aprovado_graduacao = 0;
                $aditivo->save();
                Mail::queue(new alteracao_indeferida_mail($estagio));
                request()->session()->flash('alert-info', 'Aditivo indeferido com sucesso');
            }

            //caso de necessidade de análise do parecerista
            if($request->analise_alteracao_action == 'solicitar_parecerista') {
                $request->validate([
                    'comentario_graduacao' => 'required',
                ]);
                $estagio = Estagio::find($aditivo->estagio_id);
                $aditivo->aprovado_graduacao = null;
                $aditivo->comentario_graduacao = $request->comentario_graduacao;
                $estagio->status = 'analise_alteracao_parecerista';
                $aditivo->save();
                $estagio->save();
                Mail::queue(new alteracao_mail($estagio));
                request()->session()->flash('alert-info', 'Aditivo enviado para análise do parecerista');
            }

            //parecerista aprova o aditivo
            if($request->analise_alteracao_action == 'parecerista_deferir_alteracao') {
                $request->validate([
                    'comentario_parecerista' => 'required',
                ]);
                $estagio = Estagio::find($aditivo->estagio_id);
                $aditivo->comentario_parecerista = $request->comentario_parecerista;
                $aditivo->aprovado_parecerista = 1;
                $estagio->status = 'em_analise_tecnica';
                $aditivo->save();
                $estagio->save();
                request()->session()->flash('alert-info', 'Análise enviada para o setor de estágios');
            }

            //pareceanalise_alteracaorista reprova o aditivo
            if($request->analise_alteracao_action == 'parecerista_indeferir_alteracao') {
                $request->validate([
                    'comentario_parecerista' => 'required',
                ]);
                $estagio = Estagio::find($aditivo->estagio_id);
                $aditivo->comentario_parecerista = $request->comentario_parecerista;
                $aditivo->aprovado_parecerista = 0;
                $estagio->status = 'em_analise_tecnica';
                $aditivo->save();
                $estagio->save();
                request()->session()->flash('alert-info', 'Análise enviada para o setor de estágios');
            }

            //Adm aprova após parecerista reprovar o aditivo
            if($request->analise_alteracao_action == 'deferir_alteracao_posparecerista') {
                $estagio = Estagio::find($aditivo->estagio_id);
                $aditivo->aprovado_graduacao = 1;
                $aditivo->save();
                Mail::queue(new alteracao_empresa_mail($estagio));
                request()->session()->flash('alert-info', 'Aditivo deferido com sucesso');
            }

            //Adm reprova após parecerista reprovar o aditivo
            if($request->analise_alteracao_action == 'indeferir_alteracao_posparecerista') {
                $estagio = Estagio::find($aditivo->estagio_id);
                $aditivo->aprovado_graduacao = 0;
                $aditivo->save();
                Mail::queue(new alteracao_indeferida_mail($estagio));
                request()->session()->flash('alert-info', 'Aditivo indeferido com sucesso');
            }

        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("estagios/{$estagio->id}");
    }

    #Funções Rescisão

    public function retornar_rescisao(Estagio $estagio){

        if ( Gate::allows('empresa',$estagio->cnpj) | Gate::allows('admin')) {
            $estagio->last_status = $estagio->status;
            $estagio->status = 'concluido';
            $estagio->save();
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}");
    }

    public function avaliacao(Request $request, Estagio $estagio){

        if (Gate::allows('parecerista')) {
            $request->validate([
                'avaliacao_empresa' => 'required|max:255',
                'avaliacaodescricao' => 'required|max:255',
            ]);
            $estagio->avaliacao_empresa = $request->avaliacao_empresa;
            $estagio->avaliacaodescricao = $request->avaliacaodescricao;
            $estagio->save();
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}");
    }

    #Funções Cancelamento

    public function cancelar_estagio(Estagio $estagio){

        if ( Gate::allows('empresa',$estagio->cnpj) | Gate::allows('admin')) {
                $estagio->last_status = $estagio->status;
                $estagio->status = 'cancelado';
                $estagio->save();
            } else {
                request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
            }
            return redirect("/estagios/{$estagio->id}");
        }

        public function cancelar_cancelamento(Estagio $estagio){

            if ( Gate::allows('admin')) {
                    $estagio->last_status = $estagio->status;
                    $estagio->status = 'em_analise_tecnica';
                    $estagio->save();
                } else {
                    request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
                }
                return redirect("/estagios/{$estagio->id}");
            }

    #Funções Edição

    public function enviarEdicao(EdicaoRequest $request, Estagio $estagio){
        if ( Gate::allows('admin')) {
            $estagio->update($request->validated());
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
        return redirect("/estagios/{$estagio->id}");

    }

}
