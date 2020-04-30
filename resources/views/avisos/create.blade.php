@extends('laravel-usp-theme::master')

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/avisos.css')}}">
@endsection('styles')

@section('javascripts_head')
  <script src="{{asset('/js/avisos.js')}}"></script>
@endsection('javascript_head')

@section('content')
@include('flash')


<form method="POST" action="/avisos"> 
@csrf
<div class="card">
<div class="card-header">Cadastro de Avisos</div> 
</br>
  <div class="row">
    <div class="col-sm form-group">
      <label class="col-sm required" for="titulo">Título do Aviso: </label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo')}}">
    </div>
    <div class="col-sm-4 form-group">
      <label class="col-sm required" for="divulgacao_home_ate">Divulgação Até: </label>
      <input class="form-control datepicker" id="divulgacao_home_ate" name="divulgacao_home_ate" rows="3">
    </div>
  </div>   
  <div class="row">
    <div class="col-sm form-group">
      <label class="col-sm-4 required" for="corpo">Corpo da mensagem: </label>
      <textarea class="form-control" id="corpo" name="corpo" rows="3">{{old('corpo')}}</textarea>
    </div>
  </div>
</div>
</br>
<div class="row">
  <div class="col-sm form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
  </div>
</div>    
</form>

@endsection('content')