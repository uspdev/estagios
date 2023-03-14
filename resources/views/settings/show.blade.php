@extends('main')
@section('content')

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

<form method="POST" action="/settings">
    @csrf 
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
                <label for="email_indeferido" ><b> </b></label><br>
                <textarea name="" cols="130" rows="10">{{ $ }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b> </b></label><br>
                <textarea name="" cols="130" rows="10">{{ $ }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b> </b></label><br>
                <textarea name="" cols="130" rows="10">{{ $ }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b> </b></label><br>
                <textarea name="" cols="130" rows="10">{{ $ }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b> </b></label><br>
                <textarea name="" cols="130" rows="10">{{ $ }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b> </b></label><br>
                <textarea name="" cols="130" rows="10">{{ $ }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b> </b></label><br>
                <textarea name="" cols="130" rows="10">{{ $ }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b> </b></label><br>
                <textarea name="" cols="130" rows="10">{{ $ }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b> </b></label><br>
                <textarea name="" cols="130" rows="10">{{ $ }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b> </b></label><br>
                <textarea name="" cols="130" rows="10">{{ $ }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b> </b></label><br>
                <textarea name="" cols="130" rows="10">{{ $ }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b> </b></label><br>
                <textarea name="" cols="130" rows="10">{{ $ }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>

        <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b> </b></label><br>
                <textarea name="" cols="130" rows="10">{{ $ }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %a_definir</span> 
            </div>
        </div>
        <br>
    

        <br>
        <div class="row">
            <div class="form-group col-sm">
                    <button type="submit" onclick="return confirm('Mudar o Email?');" class="btn btn-success">
                    Salvar
                    </button>
            </div>
        </div>
</form>
    
@endsection
