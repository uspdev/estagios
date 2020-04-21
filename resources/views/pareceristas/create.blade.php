@extends('laravel-usp-theme::master')

@section('content')

<form method="POST" action="/pareceristas">
@csrf
<div class="form-group">
    <label for="numero_usp">Número USP: </label>
    <input type="text" class="form-control" id="numero_usp" name="numero_usp">
</div>

<div class="form-group">
    <label for="nome">Nome: </label>
    <input type="text" class="form-control" id="nome" name="nome">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>

</form>

@endsection('content')
