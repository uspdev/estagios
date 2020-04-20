@extends('laravel-usp-theme::master')

@section('content')

<form method="POST" action="/convenios">

@csrf
<fieldset class="form-group">

	<blockquote class="blockquote text-center">
		<h4>Representante legal da Empresa que irá assinar o Termo de Convênio</h4>
	</blockquote>
  <div class="form-group row">
    <label for="nome_rep" class="col-sm-2 col-form-label">Nome:</label>
    <div class="col-sm-10">
      <input type="text" name="nome_rep" class="form-control" id="nome_rep" placeholder="Insira seu nome completo">
    </div>
  </div>
  <div class="form-group row">
    <label for="cargo_rep" class="col-sm-2 col-form-label">Cargo:</label>
    <div class="col-sm-10">
      <input type="text" name="cargo_rep" class="form-control" id="cargo_rep" placeholder="Insira seu cargo">
    </div>
  </div>
  <div class="form-group row">
    <label for="email_rep" class="col-sm-2 col-form-label">Email:</label>
    <div class="col-sm-10">
      <input type="email" name="email_rep" class="form-control" id="email_rep" placeholder="Insira seu email">
    </div>
  </div>
  <div class="form-group row">
    <label for="rg_rep" class="col-sm-2 col-form-label">RG:</label>
    <div class="col-sm-10">
      <input type="text" name="rg_rep" class="form-control" id="rg_rep" placeholder="Insira seu RG">
    </div>
  </div>
  <div class="form-group row">
    <label for="cpf_rep" class="col-sm-2 col-form-label">CPF:</label>
    <div class="col-sm-10">
      <input type="number" name="cpf_rep" class="form-control" id="cpf_rep" placeholder="Insira seu CPF (SOMENTE NÚMEROS)">
    </div>
  </div>
 </fieldset>
 <fieldset class="form-group">

	<blockquote class="blockquote text-center">
		<h4>Preencher caso haja mais Representates legais da Empresa</h4>
	</blockquote>
  <div class="form-group row">
    <label for="nome_rep2" class="col-sm-2 col-form-label">Nome:</label>
    <div class="col-sm-10">
      <input type="text" name="nome_rep2" class="form-control" id="nome_rep2" placeholder="Insira seu nome completo">
    </div>
  </div>
  <div class="form-group row">
    <label for="cargo_rep2" class="col-sm-2 col-form-label">Cargo:</label>
    <div class="col-sm-10">
      <input type="text" name="cargo_rep2" class="form-control" id="cargo_rep2" placeholder="Insira seu cargo">
    </div>
  </div>
  <div class="form-group row">
    <label for="email_rep2" class="col-sm-2 col-form-label">Email:</label>
    <div class="col-sm-10">
      <input type="email" name="email_rep2" class="form-control" id="email_rep2" placeholder="Insira seu email">
    </div>
  </div>
  <div class="form-group row">
    <label for="rg_rep2" class="col-sm-2 col-form-label">RG:</label>
    <div class="col-sm-10">
      <input type="text" name="rg_rep2" class="form-control" id="rg_rep2" placeholder="Insira seu RG">
    </div>
  </div>
  <div class="form-group row">
    <label for="cpf_rep2" class="col-sm-2 col-form-label">CPF:</label>
    <div class="col-sm-10">
      <input type="number" name="cpf_rep2" class="form-control" id="cpf_rep2" placeholder="Insira seu CPF (SOMENTE NÚMEROS)">
    </div>
  </div>
 </fieldset>
 <fieldset class="form-group">
 	<blockquote class="blockquote text-center">
		<h4>Compatibilidade de Estágio e Atividades</h4>
	</blockquote>
 	<div class="form-group">
	    <label for="desc">Descreva brevemente as condições de compatibilidade entre as atividades oferecidas para estágio e a natureza dos cursos de nossa Faculdade:</label>
	    <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>
  	</div>
  	<div class="form-group">
	    <label for="ativ">Atividades previstas para os estagiários:</label>
	    <textarea class="form-control" name="ativ" id="ativ" rows="3"></textarea>
  	</div>
  </fieldset>

<fieldset class="form-group">

	<blockquote class="blockquote text-center">
		<h4>Funcionário para contato</h4>
	</blockquote>
  <div class="form-group row">
    <label for="nome_cont" class="col-sm-2 col-form-label">Nome:</label>
    <div class="col-sm-10">
      <input type="text" name="nome_cont" class="form-control" id="nome_cont" placeholder="Insira seu nome completo">
    </div>
  </div>
  <div class="form-group row">
    <label for="tel_cont" class="col-sm-2 col-form-label">Telefone:</label>
    <div class="col-sm-10">
      <input type="text" name="tel_cont" class="form-control" id="tel_cont" placeholder="Insira seu telefone">
    </div>
  </div>
  <div class="form-group row">
    <label for="email_cont" class="col-sm-2 col-form-label">Email:</label>
    <div class="col-sm-10">
      <input type="email" name="email_cont" class="form-control" id="email_cont" placeholder="Insira seu email">
    </div>
  </div>
 </fieldset>

 <div class="form-group">
 	<blockquote class="blockquote text-center">
    	<button type="submit" class="btn btn-success">Enviar</button>
	</blockquote>
</div>

</form>	




@endsection('content')