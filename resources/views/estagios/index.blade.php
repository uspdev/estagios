@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<table class="table table-striped">
  <thead>
    <tr>
      <th>Valor da Bolsa</th>
      <th>Número USP</th>
    </tr>
  </thead>
  <tbody>
    @foreach($estagios as $estagio)
    <tr>
      <td><a href ="/estagios/{{$estagio->id}}">{{$estagio->valorbolsa}}</a></td>
      <td>{{$estagios->numero_usp}}</td>
    </tr>
    <div></div>
    @endforeach
  </tbody>
</table>

@endsection('content')