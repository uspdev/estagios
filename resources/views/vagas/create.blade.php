@extends('laravel-usp-theme::master')

@section('content')

<form method="POST" action="/vagas">
@csrf
<div>
    <h3>Cadastro de Vaga</h3>
</div>

<div class="form-group">
    <label for="titulo">Título da Vaga:</label>
    <input type="text" class="form-control" id="titulo" name="titulo">
</div>

<div class="form-group">
    <label for="descricao">Descrição da Vaga</label>
    <textarea class="form-control" id="descricao" name="descricao"></textarea>
</div>

<div class="form-group">
    <label for="expediente">Carga Horário Semanal</label>
    <input type="text" class="form-control" id="expediente" name="expediente">
</div>

<div class="form-group">
    <label for="salario">Valor mensal da Bolsa</label>
    <input type="text" class="form-control" id="salario" name="salario" placeholder="R$ 1000,00" width="190">
</div>

<div class="form-group">
<label for="horario">Horário do Estágio</label>
    <input type="text" class="form-control" id="horario" name="horario" width="190">
</div>

<div class="form-group">
    <label for="beneficios">Benefícios</label>
    <textarea class="form-control" id="beneficios" name="beneficios"></textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>

</form>

@endsection('content')