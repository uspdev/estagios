@extends('main') 

@section('javascripts_head')
  <script src="{{asset('/js/estagios.js')}}"></script>
@endsection('javascript_head')

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/estagios.css')}}">
@endsection('styles')

@section('content')
@include('flash')


@can('admin')
<form method="get" action="/estagios">
  <div class="row">
    <div class=" col-sm input-group">
      <input type="text" class="form-control" name="busca" value="{{Request()->busca}}" placeholder="Busca por número USP ou nome do/a aluno/a">  

      @inject('estagio','App\Models\Estagio')

      <select name="buscastatus" class="form-control">
        <option value="" selected="">- Status do Estágio -</option>
        @foreach($estagio->getStatus() as $key=>$status)

            <option value="{{$key}}" name="buscastatus" 
              @if($key == Request()->buscastatus) selected @endif
            >{{$status['name']}}</option>

        @endforeach
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