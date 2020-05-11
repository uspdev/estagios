@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<div class="card">
<table class="table table-striped">
    <thead>
      <tr> 
        <th><h3>Dados da Vaga</h3></th>
      </tr>
    </thead>
    <tbody>
      <tr>   
        <td><strong>Título da Vaga:</strong> {{ $vaga->titulo }}</td>
      </tr>  
      <tr>
        <td><strong>Descrição da Vaga:</strong> {{ $vaga->descricao }}</td>  
      </tr>
      <tr>
        <td><strong>Carga Horário Semanal:</strong> {{ $vaga->expediente }}</td>
      </tr>  
      <tr> 
        <td><strong>Valor mensal da Bolsa:</strong> {{ $vaga->salario }}</td>
      </tr>
      <tr>  
        <td><strong>Horário do Estágio:</strong> {{ $vaga->horario }}</td>
      </tr>
      <tr>  
        <td><strong>Benefícios:</strong> {{ $vaga->beneficios }}</td>
      </tr>
      <tr>
        <td><strong>Divulgar até:</strong> {{ $vaga->divulgar_ate }}</td>
      </tr>
    </tbody>
</table>
</div>

@endsection('content')