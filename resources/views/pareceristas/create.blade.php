@extends('main') 

@section('content')
 

<form method="POST" action="/pareceristas">
@csrf
  @include('pareceristas.form')
</form>

@endsection('content')
