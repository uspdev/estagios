@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<br>

{{ $vagas->appends(request()->query())->links() }}

<div class="card">

<table class="table table-striped">

    <thead>
      <tr> 
        <th><h3>Vagas Disponíveis</h3></th>
        <th><h3>Empresa</h3></th>
        <th><h3>Status da Vaga</h3></th>
        <th><h3>Status da Divulgação</h3></th>
        <th><h3>Ações</h3></th>
      </tr>
    </thead>

    <tbody>
      @foreach($vagas as $vaga)
      <tr>
        <td><a href="/vagas/{{$vaga->id}}">{{$vaga->titulo}}</a></td>
        <td>
          @if(App\Models\Empresa::where('cnpj',$vaga->cnpj)->first())
            {{ App\Models\Empresa::where('cnpj',$vaga->cnpj)->first()->nome }}
          @endif
        </td>
        <td>{{$vaga->status}}</td>
        <td>Divugação até {{$vaga->divulgar_ate}}</td>
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

@endsection('content')
