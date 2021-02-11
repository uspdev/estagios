@extends('laravel-usp-theme::master')

@section('content')
@include('flash')


<div class="card">
  <div class="card-header"><h3>Dados da Vaga:<h3></div>


  <div class="card-body">
    @can('owner',$vaga)
      <a href="{{ route('vagas.edit',$vaga->id) }}" class="btn btn-success">Editar</a>
      <br><br>
    @endcan
    
    @can('admin')
      <form method="POST" action="{{ route('vagas.status',$vaga->id) }}">
        @csrf
        @if($vaga->status != 'Aprovada')
          <button type="submit" value="Aprovada" name="status" class="btn btn-info"> Aprovar </button>
        @endif
        @if($vaga->status != 'Reprovada')
          <button type="submit" value="Reprovada" name="status" class="btn btn-info"> Reprovar </button>
        @endif
      </form>
      <br>
    @endcan
    
    <div class="row">

      <div class="col-sm">
        <b>Título da Vaga:</b> {{ $vaga->titulo }}
        <br></br>
        <b>Descrição da Vaga:</b> {{ $vaga->descricao }}
        <br></br>
        <b>Benefícios:</b> {{ $vaga->beneficios }}
        <br></br>
        <b>Carga Horário Semanal:</b> {{ $vaga->expediente }}
        <br></br>
        <b>Valor mensal da Bolsa:</b> {{ $vaga->salario }}
        <br></br>
        <b>Horário do Estágio:</b> {{ $vaga->horario }}
        <br></br>
        <b>Divulgar até:</b> {{ $vaga->divulgar_ate }}
        <br></br>
        <b>Contato para vaga:</b> {{ $vaga->contato ?? 'Não informado' }}
        <br></br>
      </div>

    </div>

  </div>
</div>

@endsection('content')
