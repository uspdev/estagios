@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<h3>Empresas cadastradas</h3>
@foreach($empresas as $empresa)
    <div><a href="/empresas/{{$empresa->id}}">{{$empresa->nome_da_empresa}}</a></div>
@endforeach

@endsection('content')