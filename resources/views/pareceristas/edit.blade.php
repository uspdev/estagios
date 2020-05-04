@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<form method="POST" action="/pareceristas/{{$parecerista->id}}">
@csrf
@method('patch')
@include('pareceristas.form')
</form>

@endsection('content')
