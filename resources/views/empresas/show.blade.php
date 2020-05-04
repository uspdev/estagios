@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<div class="card">
    <div class="card-header">Dados da Empresa</div>
    <div class="card-body">
        <b>Nome da Empresa:</b> {{$empresa->nome_da_empresa}}<br>
        <b>CNPJ:</b> {{$empresa->cnpj_da_empresa}}<br>
        <b>Área de Atuação:</b> {{$empresa->area_de_atuacao_da_empresa}}<br>
        <b>Endereço da Empresa:</b> {{$empresa->endereco_da_empresa}}<br>
        <b>Nome de Contato da Empresa:</b> {{$empresa->nome_de_contato_da_empresa}}<br>
        <b>E-mail de Contato da Empresa:</b> {{$empresa->email_de_contato_da_empresa}}<br>
        <b>Telefone de Contato da Empresa:</b> {{$empresa->telefone_de_contato_da_empresa}}<br>
        <b>Nome do Representante da Empresa:</b> {{$empresa->nome_do_representante_da_empresa}}<br>
        <b>Cargo do Representante da Empresa:</b> {{$empresa->cargo_do_representante_da_empresa}}<br>
        <b>Nome do Supervisor Interno do Estágio:</b> {{$empresa->nome_do_supervisor_do_estagio}}<br>
        <b>Cargo do Supervisor Interno do Estágio:</b> {{$empresa->cargo_do_supervisor_do_estagio}}<br>
        <b>Telefone do Supervisor Interno do Estágio:</b> {{$empresa->telefone_do_supervisor_do_estagio}}<br>
        <b>Email do Supervisor do Estágio:</b> {{$empresa->email_do_supervisor_do_estagio}}<br>
    </div>
</div>
@endsection('content')