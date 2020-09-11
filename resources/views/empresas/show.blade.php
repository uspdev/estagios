@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<div class="card">
    <div class="card-header">Dados da Empresa</div>
    <div class="card-body">
        <div class="row">
            <div class="col-1">
                <a class="btn btn-primary btn-success" href="/empresas/{{$empresa->id}}/edit">Editar</a>
            </div>
            <div class="col-1">
                <form method="POST" action="/empresas/{{$empresa->id}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-secondary btn-danger">Apagar</button>
                </form>
            </div>
        </div>
        <br>
        <b>Nome da Empresa:</b> {{$empresa->nome}}<br>
        <b>Razão Social:</b> {{$empresa->razao_social}}<br>
        <b>CNPJ:</b> {{$empresa->cnpj}}<br>
        <b>Nome da Empresa:</b> {{$empresa->cnpj}}<br>
        <b>Área de Atuação:</b> {{$empresa->area_de_atuacao}}<br>
        <b>Endereço da Empresa:</b> {{$empresa->endereco}}<br>
        <b>CEP:</b> {{$empresa->cep}}<br>
        <b>Nome de Contato da Empresa:</b> {{$empresa->nome_de_contato}}<br>
        <b>Telefone de Contato da Empresa:</b> {{$empresa->telefone_de_contato}}<br>
        <b>E-mail de Contato da Empresa:</b> {{$empresa->email_de_contato}}<br>
        <b>Nome do Representante da Empresa:</b> {{$empresa->nome_do_representante}}<br>
        <b>E-mail do Representante da Empresa:</b> {{$empresa->email}}<br>
        <b>Cargo do Representante da Empresa:</b> {{$empresa->cargo_do_representante}}<br>
        <b>Nome do Supervisor Interno do Estágio:</b> {{$empresa->nome_do_supervisor_estagio}}<br>
        <b>Cargo do Supervisor Interno do Estágio:</b> {{$empresa->cargo_do_supervisor_estagio}}<br>
        <b>Telefone do Supervisor Interno do Estágio:</b> {{$empresa->telefone_do_supervisor_estagio}}<br>
        <b>Email do Supervisor do Estágio:</b> {{$empresa->email_do_supervisor_estagio}}<br>
        @if($empresa->conceder_acesso_cnpj)
            <br>
            <b>Acesso de administração concedido à:</b> {{$empresa->conceder_acesso_cnpj}} - 
            {{ App\Empresa::where('cnpj',$empresa->conceder_acesso_cnpj)->first()->nome }}
            <br>
        @endif
    </div>
</div>

<br>
@include('estagios.partials.index')
<br>

@endsection('content')
