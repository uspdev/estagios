@extends('laravel-usp-theme::master')

@section('content')
@include('flash')
<div class="card">
  <div class="card-header">
    <strong>Exibição </strong>
  </div>
    <div class="row">
      <div class="col-sm-8">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
                <strong>Título do Aviso: </strong>
            </div>
              <p>{{$aviso->titulo}}</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <strong>Divulgação Até: </strong>
            </div>
              <p>{{$aviso->divulgacao_home_ate}}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm"> 
        <div class="card">  
          <div class="card-body">
            <div class="card-title">
              <strong>Corpo do Aviso: </strong>
            </div>
              <p>{{$aviso->corpo}}</p>
          </div> 
        </div>      
      </div>
    </div>
</div>
<br>
<div class="col-sm form-group">
  <a class="btn btn-success" href="/avisos" role="button">Voltar</a>
</div>



@endsection('content')