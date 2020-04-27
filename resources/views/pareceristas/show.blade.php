@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<h1>Dados do parecerista:</h1>
<br>
Número usp: {{ $parecerista->numero_usp }}
<br>
Nome: {{ $parecerista->nome }}

<br>
Acesso até: {{ $parecerista->acesso_ate }}

@endsection('content')
