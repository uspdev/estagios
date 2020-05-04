@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

@inject('pessoa','Uspdev\Replicado\Pessoa')
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