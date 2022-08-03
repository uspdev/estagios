@extends('main') 

@section('content')
 

<form method="get" action="/avisos">
<div class="row">
    <div class=" col-sm input-group">
    <input type="text" class="form-control" name="busca" value="{{ Request()->busca }}" placeholder="Buscar aviso">
    <span class="input-group-btn">
        <button type="submit" class="btn btn-success"> Buscar </button>
    </span>
    </div>
</div>
</form>
</br>

<div class="card">
  <div class="card-body" style="padding: 0rem">
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
          <td style="display: inline-flex; flex-direction: row; justify-content: center; align-items: center;">
            <a style="padding-right: 10px" class="row-sm" href="/avisos/{{$aviso->id}}/edit"><i class="far fa-edit"></i></a> 

            <a style="padding-right: 10px" class="row-sm" href="/avisos/{{$aviso->id}}"><i class="fas fa-external-link-alt"></i></a>
          
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
    {{ $avisos->appends(request()->query())->links() }}
  </div>
</div>

@endsection('content')