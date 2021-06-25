@extends('main') 

@section('content')
@include('flash')

<div class="card">
  <div class="card-header"><b>Sistema de Estágios FFLCH</b></a></div>
  <div class="card-body">

  @auth
  @else
  <div class="row">

    <div class="col-sm">
        <a href="/login/usp" class="btn btn-success"> 
          <i class="fa fa-university" aria-hidden="true"></i>
          Login USP 
        </a>
    </div>

    <div class="col-sm">
        <a href="/login/empresa" class="btn btn-success"> 
          <i class="fa fa-building" aria-hidden="true"></i>
          Login Empresa 
        </a>
    </div>

  </div>
  
  @endauth
  
  <br>

  <div class="row">
    <div class="col-sm">
      <table class="table table-striped">
        <thead>
          <tr> 
            <th colspan="2"><h2>Mural de Vagas</h3></th>
          </tr>
        </thead>

        <tbody>
          @foreach($vagas as $vaga)
          <tr>
            @if(($vaga->status) == 'Aprovada')
              <td><h4>{{$vaga->titulo}}</h4>
              Carga horária semanal: {{ $vaga->expediente }} horas <br>
              Valor da bolsa: R$ {{ $vaga->salario }}</td>
              <td><a href="/vagas/{{$vaga->id}}">Acessar vaga para mais detalhes</a></td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

      <div class="col-sm">
      @if(!$avisos->isEmpty())
      <table class="table table-striped">
        <thead>
          <tr> 
            <th><h3> Avisos </h3></th>
          </tr>
        </thead>

        <tbody>
          @foreach($avisos as $aviso)
          <tr>
            <td><b>{{$aviso->titulo}}</b><br>
                {{$aviso->corpo}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
      </div>
    </div>
  </div>
</div>

@endsection('content')
