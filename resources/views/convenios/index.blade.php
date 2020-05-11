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
		  <td><div><a href="/convenios/{{$convenio->id}}">{{$convenio->nome_representante}}</a></div></td>
			
<<<<<<< HEAD
		  <td><a href="/convenios/{{$convenio->id}}/edit"><i class="fas fa-edit"></i></a></td>
		</tr>
	
=======
		  <td>
        <a href="/convenios/{{$convenio->id}}/edit"><i class="fas fa-edit"></i></a>
        <a href="/pdfs/convenio/{{$convenio->id}}"><i class="fas fa-file-pdf"></i></a>
      </td>
    </tr>
>>>>>>> upstream/master


	@endforeach

  </tbody>
</table>	

@endsection('content')