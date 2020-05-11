@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

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
      </tr>
      @endforeach
    </tbody>
</table>
<div>

@endsection('content')