@extends('laravel-usp-theme::master')

@section('javascripts_head')
  <script src="{{asset('/js/empresas.js')}}"></script>
@endsection('javascript_head')

@section('content')
@include('flash')

<br>

<table class="table table-striped datatable" id="index">

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
                <td>{{$empresa->email}}</td>
                <td>{{$empresa->nome_do_representante}}</td>
                <td>{{$empresa->nome_do_supervisor_estagio}}</td>
                <td style="text-align:center">
                    <a href="/empresas/{{$empresa->id}}/edit"><i class="fas fa-edit"></i></a>

                @can('admin')
                    <form method="POST" action="/empresas/{{$empresa->id}}" class="form-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-link" onclick="return confirm('Tem certeza que deseja deletar esta empresa?');"><i class="fas fa-trash-alt"></i></button>
                    </form>

                    <form method="POST" action="/adminLogandoComoEmpresa/{{$empresa->cnpj}}" class="form-inline">
                        @csrf
                        <button type="submit" class="btn btn-link"><i class="fas fa-user-secret"></i></button>
                    </form>
                @endcan('admin')    
                </td>
                
            </tr>
        @endforeach
    </tbody>
</table>

@endsection('content')
