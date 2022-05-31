@extends('main') 

@section('content')
 

@section('javascripts_head')
  <script src="{{asset('/js/empresas.js')}}"></script>
@endsection('javascript_head')

<form method="POST" action="/login/empresa"> 
@csrf
<div class="card">
  <div class="card-header"><b>Login para empresas</b></div>
  
  <div class="card-body">

  @if($info_acesso)
  <div class="row">
      <div class="col-sm form-group">
          <b>Para iniciar o processo de criação de conta no sistema de estágios da FFLCH-USP, insira o CNPJ da empresa e o e-mail do representante 
          da empresa. O e-mail será vinculado a conta e utilizado em caso de perda de senha.</b>
      </div>
  </div>
  <br>
  @endif

    <div class="row">
      <div class="col-sm form-group">
        <label class="col-sm required" for="cnpj">CNPJ: </label>
          <input type="text" class="form-control cnpj" id="cnpj" name="cnpj" value="{{old('cnpj')}}">
      </div>

    @if($campo_senha)
      <div class="col-sm form-group">
        <label class="col-sm required" for="titulo">Senha </label>
          <input type="password" class="form-control" id="password" name="password">
      </div>
    </div> 
    <a href="/login/empresa_perdisenha"> Esqueci a Senha </a>
      
    @else
    <div class="col-sm form-group">
      <label class="col-sm required" for="email">Email do Representante da Empresa: </label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
      </div>
    </div>  
    @endif
  
    <div class="row">
      <div class="col-sm form-group">
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
    </div>  
  </div>

</div>

</form>

@endsection('content')