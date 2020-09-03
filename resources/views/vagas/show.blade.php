@extends('laravel-usp-theme::master')

@section('content')
@include('flash')


<div class="card">
  <div class="card-header"><h3>Dados da Vaga:<h3></div>


  <div class="card-body">

    @can('admin')
    <table class="table table-striped">
    <tbody>
    <tr>
      
        <button type="submit" style="background-color: transparent;border: none;" >
          <a href="{{ route('vagas.edit',$vaga->id) }}"><i class="far fa-edit"></a></i>
        </button>

        <form method="POST" action="/vagas/{{$vaga->id}}">
          @csrf
          @method('delete')

          <button type="submit" style="background-color: transparent;border: none;">
            <i class="far fa-trash-alt" color="#007bff"></i>
          </button>

        </form>     

    </tr>
    </tbody>
    </table>
    @endcan('admin')
  

    <div class="row">

      <div class="col-sm">

        <b>Nome da empresa:</b> {{ App\Empresa::where('cnpj',$vaga->cnpj)->first()->nome }}
        <br><br>
        <b>Email empresa:</b> {{ App\Empresa::where('cnpj',$vaga->cnpj)->first()->email }}
        </br><br>
        <b>Título da Vaga:</b> {{ $vaga->titulo }}
        <br></br>
        <b>Descrição da Vaga:</b> {{ $vaga->descricao }}
        <br></br>
        <b>Benefícios:</b> {{ $vaga->beneficios }}
        <br></br>
        <b>Carga Horário Semanal:</b> {{ $vaga->expediente }}
        <br></br>
        <b>Valor mensal da Bolsa:</b> {{ $vaga->salario }}
        <br></br>
        <b>Horário do Estágio:</b> {{ $vaga->horario }}
        <br></br>
        <b>Divulgar até:</b> {{ $vaga->divulgar_ate }}
        <br></br>

      </div>

    </div>

  </div>
</div>

@endsection('content')
