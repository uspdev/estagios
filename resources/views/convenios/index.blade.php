@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<form method="get" action="/convenios">
<div class="row">
    <div class=" col-sm input-group">
    <input type="text" class="form-control" name="busca" value="{{ Request()->busca }}">

    <span class="input-group-btn">
        <button type="submit" class="btn btn-success"> Buscar </button>
    </span>

    </div>
</div>
</form>
</br>
{{ $convenios->appends(request()->query())->links() }}
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
	
	

		  <td>
        <a href="/convenios/{{$convenio->id}}/edit"><i class="fas fa-edit"></i></a>
        <a href="/pdfs/convenio/{{$convenio->id}}"><i class="fas fa-file-pdf"></i></a>
      </td>
    </tr>


	@endforeach

  </tbody>
</table>	

@endsection('content')