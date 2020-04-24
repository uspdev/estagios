@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

@foreach($avisos as $aviso)
    <div><a href="/avisos/{{$aviso->id}}">{{$aviso->titulo}}</a></div>
@endforeach

@endsection('content')