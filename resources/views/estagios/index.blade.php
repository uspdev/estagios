@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<table class="table table-striped">
  <thead>
    <tr>
      <th>Número USP</th>
      <th>Valor da Bolsa</th>
      <th>Ações</th>      
    </tr>
  </thead>
  <tbody>
    @foreach($estagios as $estagio)
    <tr>
      <td><a href ="/estagios/{{$estagio->id}}">{{$estagio->numero_usp}}</a></td>
      <td>{{$estagio->valorbolsa}}</td>
      <td><a href="/estagios/{{$estagio->id}}/edit"><i class="far fa-edit"></i></a></i><i class="fab fa-android"></i><i class="fab fa-android"></i>
<i class="fab fa-atlassian"></i></td>          
    </tr>
    <div></div>
    @endforeach
  </tbody>
</table>

@endsection('content')