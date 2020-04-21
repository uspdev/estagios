@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<h1>Dados do parecerista:</h1>
<br>
Número usp: {{ $parecerista->nomero_usp }}
<br>
Nome: {{ $parecerista->nome }}

@endsection('content')