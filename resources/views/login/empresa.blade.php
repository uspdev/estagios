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
      <div class="col-sm form-group">
        <label class="col-sm required" for="cnpj">CNPJ: </label>
          <input type="text" class="form-control cnpj" id="cnpj" name="cnpj" value="{{old('cnpj')}}">
      </div>

      <div class="col-sm form-group">
        <label class="col-sm required" for="email">Email do Representante da Empresa: </label>
          <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
      </div>
    </div>

    <div class="row">
      <div class="col-sm form-group">
        <label class="col-sm required" for="titulo">Senha </label>
          <input type="password" class="form-control" id="password" name="password">
          <small>
            <b>Deixe a senha em branco:</b>
            <ul>
              <li> Caso queira fazer login através de um link enviado para o email</li> 
              <li> Caso sua empresa ainda não esteja cadastrada </li>
            </ul>
          </small>
      </div>
    </div>   
  
    <br>
    <div class="row">
      <div class="col-sm form-group">
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
    </div>  
  </div>

</div>

</form>

@endsection('content')