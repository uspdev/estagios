@extends('laravel-usp-theme::master')

@section('javascripts_head')
  <script src="{{asset('/js/estagios.js')}}"></script>
@endsection('javascript_head')

@section('styles')
   @parent
  <link rel="stylesheet" type="text/css" href="{{asset('/css/estagios.css')}}">
@endsection('styles')

@section('content')
@include('flash')

@include('estagios.etapas')

<form method="POST" action="/estagios/{{$estagio->id}}">
@csrf
@method('patch')
@include ('estagios.form')
</form>
@endsection('content')