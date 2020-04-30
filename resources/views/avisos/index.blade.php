@extends('laravel-usp-theme::master')

@section('content')
@include('flash')
<table class="table table-striped"> 
  <thead>
    <tr>
      <th>Título do Aviso</th>
      <th>Ações</th>
    </tr>  
  </thead>
  <tbody>
  @foreach($avisos as $aviso)
    <tr>
      <td>{{$aviso->titulo}}</a></td>
      <td>
        <a href="/avisos/{{$aviso->id}}/edit"><i class="far fa-edit"></i></a>
        <a href="/avisos/{{$aviso->id}}"><i class="fas fa-external-link-alt"></i></a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>


@endsection('content')