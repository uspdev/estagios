@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<h3>Cadastro de Avisos</h3>
<form method="POST" action="/avisos"> 
@csrf
    <div class="form-group">
        <label for="titulo">Título do Aviso: </label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo')}}">
    </div>

    <div class="form-group">
        <label for="corpo">Corpo da mensagem: </label>
        <textarea class="form-control" id="corpo" name="corpo" rows="3">{{old('corpo')}}</textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>

@endsection('content')