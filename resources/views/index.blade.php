@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<div class="card">
  <div class="card-header"><b>Sistema de Estágios FFLCH</a></div>
  <div class="card-body">

  @auth
    Já logado
  @else
  <div class="row">

    <div class="col-sm">
        <a href="/login/usp" class="btn btn-success"> 
          <i class="fa fa-university" aria-hidden="true"></i>
          Login USP 
        </a>
    </div>

    <div class="col-sm">
        <a href="/login/empresa" class="btn btn-success"> 
          <i class="fa fa-building" aria-hidden="true"></i>
          Login Empresa 
        </a>
    </div>

  </div>
  
  @endauth
    
  </div>
</div>

@endsection('content')
