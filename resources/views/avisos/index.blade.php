@extends('laravel-usp-theme::master')

@section('content')
@include('flash')
<table class="table table-striped"> 
  <thead>
    <tr>
      <th>Título do Aviso</th>
      <th>Corpo da Mensagem</th>
    </tr>  
  </thead>
  <tbody>
  @foreach($avisos as $aviso)
    <tr>
      <td><a href="/avisos/{{$aviso->id}}">{{$aviso->titulo}}</a></td>
      <td>{{$aviso->corpo}}</td>
    </tr>
  @endforeach
  </tbody>
</table>


@endsection('content')