@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<form method="get" action="/empresas">
    <div class="row">
        <div class="col-sm input-group">
        <input type="text" class="form-control" name="busca" value="{{ Request()->busca }}">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-success"> Buscar </button>
            </span>
        </div>
    </div>
</form>
<br>
{{ $empresas->appends(request()->query())->links() }}
<table class="table table-striped ">
    <thead>
        <tr>
            <th>Nome da Empresa</th>
            <th>CNPJ</th>
            <th>Email</th>
            <th>Representante</th>
            <th>Supervisor Interno</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empresas as $empresa)
            <tr>
                <td><a href="/empresas/{{$empresa->id}}">{{$empresa->nome}}</a></td>
                <td>{{$empresa->cnpj}}</td>
                <td>{{$empresa->email_contato}}</td>
                <td>{{$empresa->nome_do_representante}}</td>
                <td>{{$empresa->nome_do_supervisor_estagio}}</td>
                <td><a href="/empresas/{{$empresa->id}}/edit"><i class="fas fa-edit"></i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection('content')