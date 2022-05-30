@extends('main') 

@section('javascripts_head')
  <script src="{{asset('/js/empresas.js')}}"></script>
@endsection('javascript_head')

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/empresas.css')}}">
@endsection('styles')

@section('content')
 

<form method="POST" action="/empresas">
  @csrf
    @include('empresas.form') 
</form>

@endsection('content')