@extends('main')
@section('content')
@livewireStyles

<div class="card">
    <div class="card-header"><h4>Configurações do sistema de estágio</h4></div>
        <div class="card-body">
            <div>
                <b>Instruções de estilo:</b><br>
                <b>{{ "<br>" }}</b>: quebra de linha<br>
                <b>{{"<b>"}}</b> e <b>{{"</b>"}}</b>: determina qual parte do texto ficará em negrito<br>
                <b>{{"<center>"}}</b> e <b>{{"</center>"}}</b>: determina qual parte do texto ficará centralizada<br>
                <b>{{"<hr>"}}</b>: cria linha horizontal<br>
                <b>{{"<i>"}}</b> e <b>{{"</i>"}}</b>: determina qual parte do texto ficará em itálico<br>
                <b>{{"<u>"}}</b> e <b>{{"</u>"}}</b>: determina qual parte do texto ficará sublinhado<br>
                <b>{{"<p>"}}</b> e <b>{{"</p>"}}</b>: cria uma parágrafo<br>
            </div><br>
        </div>
    </div>

<form method="POST" action="/settings"  enctype="multipart/form-data">
    @csrf 

        <br>
        <div class="row">
            <div class="col">
                <label for="unidade" ><b>Nome da Unidade</b></label><br>
                <input name="unidade" value="{{ $unidade }}" class="w-100">
                <small class="text-muted">Exemplo: Instituto de Matemática e Estatística da Universidade de São Paulo</small>
                <br>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col">
                <label for="sigla_unidade" ><b>Sigla da Unidade</b></label><br>
                <input name="sigla_unidade" value="{{ $sigla_unidade }}" class="w-100">
                <small class="text-muted">Exemplo: IME-USP</small>
                <br>
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="alteracao_empresa_mail" ><b>alteracao_empresa_mail </b></label><br>
                <textarea name="alteracao_empresa_mail" cols="130" rows="10">{{ $alteracao_empresa_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="analise_rescisao_mail" ><b>analise_rescisao_mail </b></label><br>
                <textarea name="analise_rescisao_mail" cols="130" rows="10">{{ $analise_rescisao_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="enviar_para_analise_tecnica_mail" ><b>enviar_para_analise_tecnica_mail </b></label><br>
                <textarea name="enviar_para_analise_tecnica_mail" cols="130" rows="10">{{ $enviar_para_analise_tecnica_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="enviar_para_estudante_mail" ><b>enviar_para_estudante_mail </b></label><br>
                <textarea name="enviar_para_estudante_mail" cols="130" rows="10">{{ $enviar_para_estudante_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="gerar_rescisao_mail" ><b>gerar_rescisao_mail </b></label><br>
                <textarea name="gerar_rescisao_mail" cols="130" rows="10">{{ $gerar_rescisao_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="alteracao_indeferida_mail" ><b>alteracao_indeferida_mail </b></label><br>
                <textarea name="alteracao_indeferida_mail" cols="130" rows="10">{{ $alteracao_indeferida_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="assinatura_mail" ><b>assinatura_mail </b></label><br>
                <textarea name="assinatura_mail" cols="130" rows="10">{{ $assinatura_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="enviar_para_analise_tecnica_renovacao_mail" ><b> enviar_para_analise_tecnica_renovacao_mail</b></label><br>
                <textarea name="enviar_para_analise_tecnica_renovacao_mail" cols="130" rows="10">{{ $enviar_para_analise_tecnica_renovacao_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="justificativa_analise_tecnica" ><b> justificativa_analise_tecnica</b></label><br>
                <textarea name="justificativa_analise_tecnica" cols="130" rows="10">{{ $justificativa_analise_tecnica }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="alteracao_mail" ><b> alteracao_mail</b></label><br>
                <textarea name="alteracao_mail" cols="130" rows="10">{{ $alteracao_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="enviar_analise_academica_mail" ><b>enviar_analise_academica_mail </b></label><br>
                <textarea name="enviar_analise_academica_mail" cols="130" rows="10">{{ $enviar_analise_academica_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="enviar_para_parecerista_mail" ><b>enviar_para_parecerista_mail </b></label><br>
                <textarea name="enviar_para_parecerista_mail" cols="130" rows="10">{{ $enviar_para_parecerista_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="login_empresa_mail" ><b> login_empresa_mail</b></label><br>
                <textarea name="login_empresa_mail" cols="130" rows="10">{{ $login_empresa_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: #unidade#, #url_login#, #rodape#</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="alteracao_pendente_empresa_mail" ><b> alteracao_pendente_empresa_mail</b></label><br>
                <textarea name="alteracao_pendente_empresa_mail" cols="130" rows="10">{{ $alteracao_pendente_empresa_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="enviar_justificativa_reprovacao" ><b>enviar_justificativa_reprovacao </b></label><br>
                <textarea name="enviar_justificativa_reprovacao" cols="130" rows="10">{{ $enviar_justificativa_reprovacao }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="enviar_relatorio_mail" ><b>enviar_relatorio_mail</b></label><br>
                <textarea name="enviar_relatorio_mail" cols="130" rows="10">{{ $enviar_relatorio_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="rescisao_empresa_mail" ><b>rescisao_empresa_mail</b></label><br>
                <textarea name="rescisao_empresa_mail" cols="130" rows="10">{{ $rescisao_empresa_mail }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="aditivo" ><b>Aditivo</b></label><br>
                <textarea name="aditivo" cols="130" rows="10">{{ $aditivo }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>


        <br>
        <div class="row">
            <div class="col">
                <label for="termo" ><b>termo</b></label><br>
                <textarea name="termo" cols="130" rows="10">{{ $termo }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="header" ><b>Cabeçalho dos PDF</b></label><br>
                <textarea name="header" cols="130" rows="10">{{ $header }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <livewire:upload-logo settingsLogo="{{ $logo }}">

        <br>
        <div class="row">
            <div class="col">
                <label for="parecer" ><b>parecer</b></label><br>
                <textarea name="parecer" cols="130" rows="10">{{ $parecer }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="rescisao" ><b>rescisao</b></label><br>
                <textarea name="rescisao" cols="130" rows="10">{{ $rescisao }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="renovacao" ><b>renovacao</b></label><br>
                <textarea name="renovacao" cols="130" rows="10">{{ $renovacao }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>


        <br>
        <div class="row">
            <div class="col">
                <label for="rodape" ><b>Rodapé</b></label><br>
                <textarea name="rodape" cols="130" rows="10">{{ $rodape }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col">
                <button class="btn btn-success" type="submit">Salvar</button> 
            </div>
        </div>
        <br>
</form>
    
@livewireScripts
@endsection
