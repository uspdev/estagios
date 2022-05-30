@extends('main') 

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/estagios.css')}}">
@endsection('styles')

@section('content')
 

    <a href="{{ request()->path() }}?type=excel" class="btn btn-success">
      <i class="fa fa-file" aria-hidden="true"></i>
      Exportar para Excel
    </a>
    <br><br>
    
    {{ $estagios->appends(request()->query())->links() }}
    @include('estagios.partials.index')
    {{ $estagios->appends(request()->query())->links() }}
@endsection('content')