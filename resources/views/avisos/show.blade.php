@extends('laravel-usp-theme::master')

@section('content')
@include('flash')


<div class="card" >
    <div class="card-header">
        <strong>TÍTULO DO AVISO: </strong>
    </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{$aviso->titulo }}</li>
        </ul>
    <div class="card-header">
        <strong>CORPO DO AVISO: </strong>
    </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{$aviso->corpo }}</li>
        </ul>
</div>
<br>
<a class="btn btn-success" href="/avisos" role="button">Voltar</a>

@endsection('content')