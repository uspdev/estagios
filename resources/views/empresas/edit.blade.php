@extends('laravel-usp-theme::master')

@section('javascripts_head')
  <script src="{{asset('/js/empresas.js')}}"></script>
@endsection('javascript_head')
@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/empresas.css')}}">
@endsection('styles')

@section('content')
@include('flash')

<form method="POST" action="/empresas/{{ $empresa->id }}">
  @csrf
  @method('patch')
    @include('empresas.form')    
</form>

@endsection('content')