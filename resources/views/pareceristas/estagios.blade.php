@extends('main') 

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/estagios.css')}}">
@endsection('styles')

@section('content')
@include('flash')
    {{ $estagios->appends(request()->query())->links() }}
      @include('estagios.partials.index')
    {{ $estagios->appends(request()->query())->links() }}
@endsection('content')