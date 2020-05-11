@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<div class="row">
  <div class="col-sm-8">
    <div class="card">
        <div class="card-header">
          <strong>Título do Aviso: </strong>
        </div>
        <div class="card-body">
          <p class="card-text">{{$aviso->titulo}}</p>
        </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
        <div class="card-header">
          <strong>Divulgação Até: </strong>
        </div>
        <div class="card-body">
          <p class="card-text">{{$aviso->divulgacao_home_ate}}</p>
        </div>
    </div>
  </div>
</div>
<div class="row"> 
  <div class="col-sm">
    <div class="card">     
      <div class="card-header">
        <strong>Corpo do Aviso: </strong>
      </div>
      <div class="card-body">
        <p class="card-text">{{$aviso->corpo}}</p>
      </div>       
    </div>
  </div>
</div>
<br>
<a class="btn btn-success" href="/avisos" role="button">Voltar</a>

@endsection('content')