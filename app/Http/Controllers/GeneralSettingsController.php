<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\GeneralSettings;

class GeneralSettingsController extends Controller
{
    public function show(GeneralSettings $settings){
        $this->authorize('admin');

        return view('settings.show', [
            'alteracao_empresa_mail' => $settings->alteracao_empresa_mail,
            'analise_rescisao_mail' => $settings->analise_rescisao_mail,
            'enviar_para_analise_tecnica_mail' => $settings->enviar_para_analise_tecnica_mail,
            'enviar_para_estudante_mail' => $settings->enviar_para_estudante_mail,
            'gerar_rescisao_mail' => $settings->gerar_rescisao_mail,
            'alteracao_indeferida_mail' => $settings->alteracao_indeferida_mail,
            'assinatura_mail' => $settings->assinatura_mail,
            'enviar_para_analise_tecnica_renovacao_mail' => $settings->enviar_para_analise_tecnica_renovacao_mail,
            'justificativa_analise_tecnica' => $settings->justificativa_analise_tecnica,
            'alteracao_mail' => $settings->alteracao_mail,
            'enviar_analise_academica_mail' => $settings->enviar_analise_academica_mail,
            'enviar_para_parecerista_mail' => $settings->enviar_para_parecerista_mail,
            'login_empresa_mail' => $settings->login_empresa_mail,
            'alteracao_pendente_empresa_mail' => $settings->alteracao_pendente_empresa_mail,
            'enviar_justificativa_reprovacao' => $settings->enviar_justificativa_reprovacao,
            'enviar_relatorio_mail' => $settings->enviar_relatorio_mail,
            'rescisao_empresa_mail' => $settings->rescisao_empresa_mail,
            'rodape' => $settings->rodape,
            'unidade' => $settings->unidade,
            'header' => $settings->header,
            'aditivo' => $settings->aditivo,
            'parecer' => $settings->parecer,
            'rescisao' => $settings->rescisao,
            'renovacao' => $settings->renovacao,
            'termo' => $settings->termo,
            'unidade' => $settings->unidade
        ]);
    }

    public function update(Request $request, GeneralSettings $settings){
        $this->authorize('admin');

        $request->validate([
            'alteracao_empresa_mail' => 'required',
            'enviar_para_analise_tecnica_mail' => 'required',
            'enviar_para_estudante_mail' => 'required',
            'gerar_rescisao_mail' => 'required',
            'alteracao_indeferida_mail' => 'required',
            'assinatura_mail' => 'required',
            'enviar_para_analise_tecnica_renovacao_mail' => 'required',
            'justificativa_analise_tecnica' => 'required',
            'alteracao_mail' => 'required',
            'enviar_analise_academica_mail' => 'required',
            'enviar_para_parecerista_mail' => 'required',
            'login_empresa_mail' => 'required',
            'alteracao_pendente_empresa_mail' => 'required',
            'enviar_justificativa_reprovacao' => 'required',
            'enviar_relatorio_mail' => 'required',
            'rescisao_empresa_mail' => 'required',
            'rodape' => 'required',
            'unidade' => 'required',
            'aditivo' => 'required',
            'header' => 'required',
            'parecer' => 'required',
            'rescisao' => 'required',
            'renovacao' => 'required',
            'termo' => 'required'
        ]);

        $settings->alteracao_empresa_mail = $request->input('alteracao_empresa_mail');
        $settings->analise_rescisao_mail = $request->input('analise_rescisao_mail');
        $settings->enviar_para_analise_tecnica_mail = $request->input('enviar_para_analise_tecnica_mail');
        $settings->enviar_para_estudante_mail = $request->input('enviar_para_estudante_mail');
        $settings->gerar_rescisao_mail = $request->input('gerar_rescisao_mail');
        $settings->alteracao_indeferida_mail = $request->input('alteracao_indeferida_mail');
        $settings->assinatura_mail = $request->input('assinatura_mail');
        $settings->enviar_para_analise_tecnica_renovacao_mail = $request->input('enviar_para_analise_tecnica_renovacao_mail');
        $settings->justificativa_analise_tecnica = $request->input('justificativa_analise_tecnica');
        $settings->alteracao_mail = $request->input('alteracao_mail');
        $settings->enviar_analise_academica_mail = $request->input('enviar_analise_academica_mail');
        $settings->enviar_para_parecerista_mail = $request->input('enviar_para_parecerista_mail');
        $settings->login_empresa_mail = $request->input('login_empresa_mail');
        $settings->alteracao_pendente_empresa_mail = $request->input('alteracao_pendente_empresa_mail');
        $settings->enviar_justificativa_reprovacao = $request->input('enviar_justificativa_reprovacao');
        $settings->enviar_relatorio_mail = $request->input('enviar_relatorio_mail');
        $settings->rescisao_empresa_mail = $request->input('rescisao_empresa_mail');
        $settings->rodape = $request->input('rodape');
        $settings->unidade = $request->input('unidade');
        $settings->unidade = $request->input('header');
        $settings->unidade = $request->input('aditivo');
        $settings->unidade = $request->input('parecer');
        $settings->unidade = $request->input('rescisao');
        $settings->unidade = $request->input('renovacao');
        $settings->unidade = $request->input('termo');

        $settings->save();
        return redirect()->back();
    }
}
