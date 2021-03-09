@extends('main') 

@section('content')
@include('flash')

<form method="get" action="/pareceristas">
<div class="row">
    <div class=" col-sm input-group">
    <input type="text" class="form-control" name="busca" value="{{ Request()->busca }}" placeholder="Busca somente por número USP">

    <span class="input-group-btn">
        <button type="submit" class="btn btn-success"> Buscar </button>
    </span>

    </div>
</div>
</form>
<br>

{{ $pareceristas->appends(request()->query())->links() }}
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Número USP</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pareceristas->sortBy('numero_usp') as $parecerista)
    <tr>
      <td>
        <a href="/pareceristas/{{$parecerista->id}}">
          {{ $parecerista->nome }}
        </a>
        @if($parecerista->presidente == 1) Presidente da Comissão @endif
      </td>
      <td>{{$parecerista->numero_usp}}</td>
      <td><a href="/pareceristas/{{$parecerista->id}}/edit"><i class="fas fa-edit"></a></i></td>
      <td>
        <form method="POST" action="/pareceristas/{{$parecerista->id}}" class="form-inline">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-link" onclick="return confirm('Tem certeza que deseja deletar esse parecerista?');"><i class="fas fa-trash-alt"></i></button>
        </form>

        <form method="POST" action="/adminLogandoComoParecerista/{{$parecerista->numero_usp}}" class="form-inline">
            @csrf
            <button type="submit" class="btn btn-link"><i class="fas fa-user-secret"></i></button>
        </form>
      </td>
    </tr>
    <div></div>
    @endforeach
  </tbody>
</table>

@endsection('content')