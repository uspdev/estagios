@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<h3>Vagas Disponíveis:</h3>

@foreach($vagas as $vaga)
    <div><p><a href="/vagas/{{$vaga->id}}">{{$vaga->titulo}}</a></p></div>
@endforeach

@endsection('content')