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
        </div>
        <br>
        <b>Nome da Empresa:</b> {{$empresa->nome}}<br>
        <b>CNPJ:</b> {{$empresa->cnpj}}<br>
        <b>Nome da Empresa:</b> {{$empresa->cnpj}}<br>
        <b>Área de Atuação:</b> {{$empresa->area_de_atuacao}}<br>
        <b>Endereço da Empresa:</b> {{$empresa->endereco}}<br>
        <b>CEP:</b> {{$empresa->cep}}<br>
        <b>Nome do Representante da Empresa:</b> {{$empresa->nome_do_representante}}<br>
        <b>E-mail do Representante da Empresa:</b> {{$empresa->email}}<br>
        <b>Cargo do Representante da Empresa:</b> {{$empresa->cargo_do_representante}}<br>
        @if($empresa->conceder_acesso_cnpj)
            <br>
            <b>Acesso de administração concedido à:</b> {{$empresa->conceder_acesso_cnpj}} - 
            {{ App\Models\Empresa::where('cnpj',$empresa->conceder_acesso_cnpj)->first()->nome }}
            <br>
        @endif
    </div>
</div>

<br>

{{$estagios->appends(request()->query())->links()}}

@include('estagios.partials.index')
<br>

@endsection('content')
