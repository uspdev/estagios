@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
	@foreach($convenios as $convenio)
		<tr>
		  <td><div><a href="/convenios/{{$convenio->id}}">{{$convenio->nome_rep}}</a></div></td>
			
		  <td>
        <a href="/convenios/{{$convenio->id}}/edit"><i class="fas fa-edit"></i></a>
        <a href="/convenios/{{$convenio->id}}/edit"><i class="fas fa-file-pdf"></i></a>
      </td>
    </tr>


	@endforeach

  </tbody>
</table>	

@endsection('content')