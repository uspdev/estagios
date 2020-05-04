@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<div class="container">
        <h3>Empresas Cadastradas</h3>
        <table class="table table-sm table-striped table-responsive">
            <thead>
                <tr>
                    <th>Nome da Empresa</th>
                    <th>CNPJ</th>
                    <th>Área de Atuação da Empresa</th>
                    <th>Nome do Representante da Empresa</th>
                    <th>Nome do Supervisor Interno de Estágio</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empresas as $empresa)
                    <tr>
                        <td><a href="/empresas/{{$empresa->id}}">{{$empresa->nome_da_empresa}}</a></td>
                        <td>{{$empresa->cnpj_da_empresa}}</td>
                        <td>{{$empresa->area_de_atuacao_da_empresa}}</td>
                        <td>{{$empresa->nome_do_representante_da_empresa}}</td>
                        <td>{{$empresa->nome_do_supervisor_do_estagio}}</td>
                        <td><a href="/empresas/{{$empresa->id}}/edit"><i class="fas fa-edit"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>

@endsection('content')