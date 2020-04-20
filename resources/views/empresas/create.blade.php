@extends('laravel-usp-theme::master')

@section('content')

<form method="POST" action="/empresas">
    @csrf
    <h2>Cadastro de Empresa</h2>
    <div class="form-group">
        <label for="nome_da_empresa">Nome da Empresa: <span title="Este campo é obrigatório.">*</span></label>
        <input type="text" maxlength="128" class="form-control" name="nome_da_empresa"/>
    </div>
    <div class="form-group">
        <label for="cnpj_da_empresa">CNPJ: <span title="Este campo é obrigatório.">*</span></label>
        <input type="text" maxlength="128" class="form-control" name="cnpj_da_empresa"/>
    </div>
    <div class="form-group">
        <label for="area_de_atuacao_da_empresa">Área de atuação da Empresa: <span title="Este campo é obrigatório.">*</span></label>
        <input type="text" maxlength="128" class="form-control" name="area_de_atuacao_da_empresa"/>
    </div>
    <div class="form-group">
        <label for="endereco_da_empresa">Endereço da Empresa: <span title="Este campo é obrigatório.">*</span></label>
        <input type="text" maxlength="128" class="form-control" name="endereco_da_empresa"/>
    </div>    
    <div class="form-group">
        <label for="nome_do_representante_da_empresa">Nome do representante da Empresa que irá assinar o Termo de Compromisso: <span title="Este campo é obrigatório.">*</span></label>
        <input type="text" maxlength="128" class="form-control" name="nome_do_representante_da_empresa"/>
    </div>    
    <div class="form-group">
        <label for="cargo_do_representante_da_empresa">Cargo do Representante da Empresa: <span title="Este campo é obrigatório.">*</span></label>
        <input type="text" maxlength="128" class="form-control" name="cargo_do_representante_da_empresa"/>
    </div>
    <div class="form-group">
        <label for="nome_do_supervisor_do_estagio">Nome do Supervisor do Interno de Estágio que assinará o Plano de Estágio: <span title="Este campo é obrigatório.">*</span></label>
        <input type="text" maxlength="128" class="form-control" name="nome_do_supervisor_do_estagio"/>
    </div>
    <div class="form-group">
        <label for="cargo_do_supervisor_do_estagio">Cargo do supervisor interno do estágio: <span title="Este campo é obrigatório.">*</span></label>
        <input type="text" maxlength="128" class="form-control" name="cargo_do_supervisor_do_estagio"/>
    </div>
    <div class="form-group">
        <label for="telefone_do_supervisor_do_estagio">Telefone do Supervisor de Estágios: <span title="Este campo é obrigatório.">*</span></label>
        <input type="text" maxlength="128" class="form-control" name="telefone_do_supervisor_do_estagio"/>
    </div>    
    <div class="form-group">
        <label for="email_do_supervisor_do_estagio">E-mail do Supervisor de Estágios: <span title="Este campo é obrigatório.">*</span></label>
        <input type="email" maxlength="128" class="form-control" name="email_do_supervisor_do_estagio"/>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enviar</button>    
    </div>    
</form>

@endsection('content')