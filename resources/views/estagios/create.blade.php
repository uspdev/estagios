@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<form method="POST" action="/estagios">
@csrf
@include ('estagios.form')

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>

</form>

@endsection('content')
