@extends('laravel-usp-theme::master')

@section('javascripts_head')
  <script src="{{asset('/js/estagios.js')}}"></script>
@endsection('javascript_head')

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/estagios.css')}}">
@endsection('styles')

@section('content')
@include('flash')
<br>

@include('estagios.partials.index')

@endsection('content')