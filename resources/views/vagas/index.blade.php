@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<br>

{{ $vagas->appends(request()->query())->links() }}

<div class="card">

<div class="card-body">
<table class="table table-striped">

    <thead>
      <tr> 
        <th><h3>Vagas Disponíveis</h3></th>
        <th><h3>Cadastrada por</h3></th>
        <th><h3>Status</h3></th>
        <th><h3>Divulgação até</h3></th>
        <th><h3>Ações</h3></th>
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
