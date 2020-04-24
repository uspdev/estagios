@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<h3>Dados da Vaga:</h3>
<br>
<strong>Título da Vaga:</strong> {{ $vaga->titulo }}
<br></p>
<strong>Descrição da Vaga:</strong> {{ $vaga->descricao }}
<br></p>
<strong>Carga Horário Semanal:</strong> {{ $vaga->expediente }}
<br></p>
<strong>Valor mensal da Bolsa:</strong> {{ $vaga->salario }}
<br></p>
<strong>Horário do Estágio:</strong> {{ $vaga->horario }}
<br></p>
<strong>Benefícios:</strong> {{ $vaga->beneficios }}

@endsection('content')