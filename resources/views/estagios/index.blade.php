@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

@foreach($estagios as $estagio)
    <div><a href ="/estagios/{{$estagio->id}}">{{$estagio->valorbolsa}}</a></div>
@endforeach

@endsection('content')