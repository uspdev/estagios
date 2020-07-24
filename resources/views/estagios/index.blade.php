@extends('laravel-usp-theme::master')

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/estagios.css')}}">
@endsection('styles')

@section('content')
@include('flash')

@can('admin')
<form method="get" action="/estagios">
  <div class="row">
    <div class=" col-sm input-group">
      <input type="text" class="form-control" name="busca" value="{{Request()->busca}}" placeholder="Busca somente por número USP do/a aluno/a">  

      <select name="buscastatus" class="form-control">
        <option value="" selected="">- Status do Estágio -</option>
        <option value="em_elaboracao" >Em Elaboração</option>
        <option value="em_analise_tecnica" >Em Análise Técnica</option>
        <option value="em_analise_academica" >Sob Parecer de Mérito</option>
        <option value="'em_alteracao" >Sob Aditivo de Alterações</option>
        <option value="em_analise_tecnica_alteracao" >Em Análise das Alterações</option>
        <option value="concluido" >Processo Concluído</option>
        <option value="rescisao">Estágio Rescindido</option>
      </select>

      <span class="input-group-btn">
        <button type="submit" class="btn btn-success"> Buscar </button>
      </span>
    </div>
  </div>
</form>
@endcan('admin')
<br>

{{$estagios->appends(request()->query())->links()}}
@include('estagios.partials.index')

@endsection('content')