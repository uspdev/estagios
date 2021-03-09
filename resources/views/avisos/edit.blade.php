@extends('main') 

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/avisos.css')}}">
@endsection('styles')

@section('javascripts_head')
  <script src="{{asset('/js/avisos.js')}}"></script>
@endsection('javascript_head')

@section('content')
@include('flash')


<form method="POST" action="/avisos/{{$aviso->id}}"> 
@csrf
@method('patch')
<div class="card">
<div class="card-header">Edição de Aviso</div> 
  @include('avisos.form')
</div>    
</form>

@endsection('content')