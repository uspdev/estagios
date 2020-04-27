@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<div class="text-nowrap">
        <h3>Empresas Cadastradas</h3>
        <table class="table table-sm table-striped table-responsive">
            <thead>
                <tr>
                    <th>Ações</th>
                    <th>Nome da Empresa</th>
                    <th>CNPJ</th>
                    <th>Área de Atuação da Empresa</th>
                    <th>Endereço da Empresa</th>
                    <th>Nome de Contato da Empresa</th>
                    <th>E-mail de Contato da Empresa</th>
                    <th>Telefone de Contato da Empresa</th>
                    <th>Nome do Representante da Empresa</th>
                    <th>Cargo do Representante da Empresa</th>
                    <th>Nome do Supervisor Interno de Estágio</th>
                    <th>Cargo do Supervisor Interno do Estágio</th>
                    <th>Telefone do Supervisor de Estágios</th>
                    <th>E-mail do Supervisor de Estágios</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empresas as $empresa)
                    <tr>
                        <td><a href="/empresas/{{$empresa->id}}/edit"><i class="fas fa-edit"></i></a></td>
                        <td><a href="/empresas/{{$empresa->id}}">{{$empresa->nome_da_empresa}}</a></td>
                        <td>{{$empresa->cnpj_da_empresa}}</td>
                        <td>{{$empresa->area_de_atuacao_da_empresa}}</td>
                        <td>{{$empresa->endereco_da_empresa}}</td>
                        <td>{{$empresa->nome_de_contato_da_empresa}}</td>
                        <td>{{$empresa->email_de_contato_da_empresa}}</td>
                        <td>{{$empresa->telefone_de_contato_da_empresa}}</td>
                        <td>{{$empresa->nome_do_representante_da_empresa}}</td>
                        <td>{{$empresa->cargo_do_representante_da_empresa}}</td>
                        <td>{{$empresa->nome_do_supervisor_do_estagio}}</td>
                        <td>{{$empresa->cargo_do_supervisor_do_estagio}}</td>
                        <td>{{$empresa->telefone_do_supervisor_do_estagio}}</td>
                        <td>{{$empresa->email_do_supervisor_do_estagio}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>

@endsection('content')