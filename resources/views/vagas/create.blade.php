@extends('laravel-usp-theme::master')

@section('content')
@include('flash')
 
<form method="POST" action="/vagas">
@csrf
<div>
    <h3>Cadastro de Vaga</h3>
</div>

<div class="form-group">
    <label for="titulo">Título da Vaga</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo')}}">
</div>

<div class="form-group">
    <label for="descricao">Descrição da Vaga</label>
    <textarea class="form-control" id="descricao" name="descricao">{{old('descricao')}}</textarea>
</div>

<div class="form-group">
    <label for="expediente">Carga Horário Semanal</label>
    <input type="text" class="form-control" id="expediente" name="expediente" value="{{old('expediente')}}">
</div>

<div class="form-group">
    <label for="salario">Valor mensal da Bolsa</label>
    <input type="text" class="form-control" id="salario" name="salario" placeholder="R$ 1000,00" width="190" value="{{old('salario')}}">
</div>

<div class="form-group">
<label for="horario">Horário do Estágio</label>
    <input type="text" class="form-control" id="horario" name="horario" width="190" value="{{old('horario')}}">
</div>

<div class="form-group">
    <label for="beneficios">Benefícios</label>
    <textarea class="form-control" id="beneficios" name="beneficios">{{old('beneficios')}}</textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>

</form>

@endsection('content')