@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<form method="get" action="/estagios">
  <div class="row">
    <div class=" col-sm input-group">
      <input type="text" class="form-control" name="busca" value="{{ Request()->busca}}">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-success"> Buscar </button>
      </span>
    </div>
  </div>
</form>

<br>

{{$estagios->appends(request()->query())->links()}}
@include('estagios.partials.index')

@endsection('content')