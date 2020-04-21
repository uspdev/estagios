@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

@foreach($pareceristas as $parecerista)
    <div><a href="/pareceristas/{{$parecerista->id}}">{{$parecerista->nome}}</a></div>
@endforeach

@endsection('content')