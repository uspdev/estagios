@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

@section('javascripts_head')
  <script src="{{asset('/js/empresas.js')}}"></script>
@endsection('javascript_head')

<form method="POST" action="/login/empresa"> 
@csrf
<div class="card">
  <div class="card-header"><b>Login para empresas</b></div>
  
  <div class="card-body">
    <div class="row">
      <div class="col-sm">
        Será enviado um link para o email da empresa para a realização do login.
      </div>
    </div>
    <br>

    <div class="row">
      <div class="col-sm form-group">
        <label class="col-sm required" for="cnpj">CNPJ</label>
          <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{old('cnpj')}}">
      </div>

      <div class="col-sm form-group">
        <label class="col-sm required" for="titulo">Email: </label>
          <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
      </div>

    </div>   
  
    </br>
    <div class="row">
      <div class="col-sm form-group">
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
    </div>  
  </div>
</div>

</form>

@endsection('content')