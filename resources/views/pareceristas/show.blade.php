@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

@inject('pessoa','Uspdev\Replicado\Pessoa')

<div class="card">
  <div class="card-header">Dados do/a parecerista:</div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm">
        <button type="submit" class="btn btn-success">
          <a href="{{ route('pareceristas.edit',$parecerista->id) }}">Editar</a>
        </button>
      </div>
    </div>

    <div class="row">
      <div class="col-sm">
        <b>Número usp:</b> {{ $parecerista->numero_usp }}
        <br>
        <b>Nome:</b> {{ $pessoa::dump($parecerista->numero_usp)['nompes'] }}
        <br>
        É o/a Presidente da Comissão de Graduação? {{$parecerista->presidente? "sim":"não"}} 
      </div>
    </div>

  </div>
</div>

@endsection('content')
