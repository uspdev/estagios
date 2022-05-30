@extends('main') 

@section('content')
 

<div class="card">
  <div class="card-header">Dados do/a parecerista:</div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm">
        <a href="{{ route('pareceristas.edit',$parecerista->id) }}" class="btn btn-success">Editar</a>
      </div>
    </div>

    <div class="row">
      <div class="col-sm">
        <b>Número usp:</b> {{ $parecerista->numero_usp }}
        <br>
        <b>Nome:</b> {{ $parecerista->nome }}
        <br>
        É o/a Presidente da Comissão de Graduação? {{$parecerista->presidente? "sim":"não"}} 
      </div>
    </div>

  </div>
</div>

@endsection('content')
