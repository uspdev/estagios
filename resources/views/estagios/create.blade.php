@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<form method="POST" action="/estagios">
@csrf
@include ('estagios.form')
</form>

@endsection('content')
