@extends('laravel-usp-theme::master')

@section('javascripts_head')
  <script src="{{asset('/js/pareceristas.js')}}"></script>
@endsection('javascript_head')

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/pareceristas.css')}}">
@endsection('styles')

@section('content')
@include('flash')

<form method="POST" action="/pareceristas/{{$parecerista->id}}">
@csrf
@method('patch')
@include('pareceristas.form')
</form>

@endsection('content')
