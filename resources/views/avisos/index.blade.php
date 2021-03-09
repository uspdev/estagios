@extends('main') 

@section('content')
@include('flash')

<form method="get" action="/avisos">
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

{{ $avisos->appends(request()->query())->links() }}

<div class="card">
  <div class="card-body">
    <table class="table table-striped"> 
      <thead class="card-header">
        <tr>
          <th>Avisos</th>
          <th>Ações</th>
        </tr>  
      </thead>
      <tbody>
      @foreach($avisos as $aviso)
        <tr>
          <td>{{$aviso->titulo}}</a></td>
          <td >
            <a class="row-sm" href="/avisos/{{$aviso->id}}/edit"><i class="far fa-edit"></i></a>
            <a class="row-sm" href="/avisos/{{$aviso->id}}"><i class="fas fa-external-link-alt"></i></a>
           
          
            <form class="row-sm" method="POST" action="/avisos/{{$aviso->id}}">
              @csrf
              @method('delete')
              <button type="submit" class=" btn btn-outline-primary btn-sm"><i class="fas fa-trash-alt"></i></button>
            </form> 
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection('content')