@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

	@foreach($convenios as $convenio)

		<div><a href="/convenios/{{$convenio->id}}">{{$convenio->nome_rep}}</a></div>

	@endforeach


@endsection('content')