@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<form method="POST" action="/pareceristas">
@csrf
  @include('pareceristas.form')
</form>

@endsection('content')
