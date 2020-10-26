@extends('laravel-usp-theme::master')

@section('javascripts_head')
  <script src="{{asset('/js/empresas.js')}}"></script>
@endsection('javascript_head')

@section('content')
@include('flash')

<form method="get" action="/empresas">
    <div class="row">
        <div class="col-sm input-group">
        <input type="text" class="form-control" name="busca" value="{{ Request()->busca }}" placeholder="Busca somente por CNPJ">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-success"> Buscar </button>
            </span>
        </div>
    </div>
</form>
<br>

{{ $empresas->appends(request()->query())->links() }}

<table class="table table-striped" id="index">

    <thead>
        <tr>
            <th>Nome da Empresa</th>
            <th>CNPJ</th>
            <th>Email</th>
            <th>Representante</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empresas as $empresa)
            <tr>
                <td>
                    @can('admin_ou_empresa',$empresa->cnpj)
                        <a href="/empresas/{{$empresa->id}}">{{$empresa->nome}}</a>
                    @else
                        {{$empresa->nome}}
                    @endcan
                
                </td>
                <td>{{$empresa->cnpj}}</td>
                <td>{{$empresa->email}}</td>
                <td>{{$empresa->nome_do_representante}}</td>
                <td style="text-align:center">

                @can('admin_ou_empresa',$empresa->cnpj)
                    <a href="/empresas/{{$empresa->id}}/edit"><i class="fas fa-edit"></i></a>
                @else
                    <form method="POST" action="/logandoComoEmpresa/{{$empresa->cnpj}}" class="form-inline">
                        @csrf
                        <button type="submit" class="btn btn-link"><i class="fas fa-user-secret"></i></button>
                    </form>
                @endcan

                @can('admin')
                    <form method="POST" action="/logandoComoEmpresa/{{$empresa->cnpj}}" class="form-inline">
                        @csrf
                        <button type="submit" class="btn btn-link"><i class="fas fa-user-secret"></i></button>
                    </form>
                @endcan('admin') 

                <!--
                <form method="POST" action="/empresas/{{$empresa->id}}" class="form-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-link" onclick="return confirm('Tem certeza que deseja deletar esta empresa?');"><i class="fas fa-trash-alt"></i></button>
                </form>
                -->  
                </td>
                
            </tr>
        @endforeach
    </tbody>
</table>

@endsection('content')
