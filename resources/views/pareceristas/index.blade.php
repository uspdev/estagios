@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

@inject('pessoa','Uspdev\Replicado\Pessoa')

<form method="get" action="/pareceristas">
<div class="row">
    <div class=" col-sm input-group">
    <input type="text" class="form-control" name="busca" value="{{ Request()->busca }}">

    <span class="input-group-btn">
        <button type="submit" class="btn btn-success"> Buscar </button>
    </span>

    </div>
</div>
</form>
<br>

{{ $pareceristas->appends(request()->query())->links() }}
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Número USP</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pareceristas as $parecerista)
    <tr>
      <td>
        <a href="/pareceristas/{{$parecerista->id}}">
          {{ $pessoa::dump($parecerista->numero_usp)['nompes'] }}
        </a>
      </td>
      <td>{{$parecerista->numero_usp}}</td>
      <td><a href="/pareceristas/{{$parecerista->id}}/edit"><i class="fas fa-edit"></a></i></td>
    </tr>
    <div></div>
    @endforeach
  </tbody>
</table>

@endsection('content')