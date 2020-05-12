@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

@inject('pessoa','Uspdev\Replicado\Pessoa')

<form method="get" action="/estagios">
<div class="row">
    <div class=" col-sm input-group">
    <input type="text" class="form-control" name="busca" value="{{ Request()->busca}}">

    <span class="input-group-btn">
        <button type="submit" class="btn btn-success"> Buscar </button>
    </span>

    </div>
</div>
</form>

<br>

{{$estagios->links()}}
<table class="table table-striped">
  <thead>
    <tr>
      <th>Número USP</th>
      <th>Nome</th>
      <th>Valor da Bolsa</th>
      <th>Ações</th>      
    </tr>
  </thead>
  <tbody>
    @foreach($estagios as $estagio)
    <tr>

    <td>
      <a href ="/estagios/{{$estagio->id}}">
        {{$estagio->numero_usp}}      
      </a>
    </td>

    <td>
      {{$pessoa::dump($estagio->numero_usp)['nompes'] }}
    </td>

    <td>
      {{$estagio->valorbolsa}}
    </td>

    <td>
      <a href="/estagios/{{$estagio->id}}/edit">
        <i class="fas fa-edit">
      </a></i>
    </td>   

    </tr>
    <div></div>
    @endforeach
  </tbody>
</table>

@endsection('content')