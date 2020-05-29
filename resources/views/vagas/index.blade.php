@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<form method="get" action="/vagas">
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

{{ $vagas->appends(request()->query())->links() }}

<div class="card">

<table class="table table-striped">

    <thead>
      <tr> 
        <th><h3>Vagas Disponíveis</h3></th>
        <th><h3>Ações</h3></th>
      </tr>
    </thead>

    <tbody>
      @foreach($vagas as $vaga)
      <tr>
        <td><a href="/vagas/{{$vaga->id}}">{{$vaga->titulo}}</a></td>
        <td><a href="/vagas/{{$vaga->id}}/edit"><i class="far fa-edit"></a></i></td>
        <td>
          <form method="POST" action="/vagas/{{$vaga->id}}">
            @csrf
            @method('delete')
            <button type="submit" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>

</table>
<div>

@endsection('content')