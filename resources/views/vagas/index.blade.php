@extends('main') 

@section('content')
 

<br>

{{ $vagas->appends(request()->query())->links() }}

<div class="card">

<div class="card-body">
<table class="table table-striped">

    <thead>
      <tr> 
        <th><h5>Vagas Disponíveis</h5></th>
        <th><h5>Cadastrada por</h5></th>
        <th><h5>Status</h5></th>
        <th><h5>Divulgação até</h5></th>
        <th><h5>Ações</h5></th>
      </tr>
    </thead>

    <tbody>
      @foreach($vagas as $vaga)
      <tr>
        <td><a href="/vagas/{{$vaga->id}}">{{ $vaga->titulo }}</a></td>
        <td> @if($vaga->user){{ $vaga->user->name }}@endif
        </td>
        <td>{{$vaga->status}}</td>
        <td>{{$vaga->divulgar_ate}}</td>
        <td> 
          <form method="POST" action="/vagas/{{$vaga->id}}">
            @csrf
            @method('delete')
            <button type="submit" style="background-color: transparent;border: none;" onclick="return confirm('Tem certeza que deseja deletar?');"><i class="far fa-trash-alt" color="#007bff"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>

</table>
<div>
<div>

@endsection('content')
