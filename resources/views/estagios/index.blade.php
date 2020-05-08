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
      <td>
        <a href="/estagios/{{$estagio->id}}/edit"><i class="fas fa-edit"></a></i>
        <a href="/estagios/{{$estagio->id}}/edit"><i class="fas fa-file-pdf"></i></a>
      </td>          
    </tr>
    <div></div>
    @endforeach
  </tbody>
</table>

@endsection('content')