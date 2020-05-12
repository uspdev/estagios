@extends('laravel-usp-theme::master')

@section('javascripts_head')
  <script src="{{asset('/js/convenios.js')}}"></script>
@endsection('javascript_head')

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/convenios.css')}}">
@endsection('styles')

@section('content')
@include('flash')
<form method="POST" action="/convenios">

@csrf
@include('convenios.form')
</form>	




@endsection('content')