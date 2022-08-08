@extends('main') 

@section('content')
 

<div class="card">
  <div class="card-header"><h3>Dados da Vaga:<h3></div>

  <div class="card-body">
    @can('owner',$vaga)
      <a href="{{ route('vagas.edit',$vaga->id) }}" class="btn btn-success">Editar</a>
      <br><br>
    @endcan
    
    @can('admin')
      <form method="POST" action="{{ route('vagas.status',$vaga->id) }}" id="formStatus">
        @csrf
        @if($vaga->status != 'Aprovada')
          <button type="submit" value="Aprovada" name="status" class="btn btn-info"> Aprovar </button>
        @endif
        @if($vaga->status != 'Reprovada')
          <button type="button" value="Reprovada" name="status" data-toggle="modal" data-target="#exampleModal" class="btn btn-info"> Reprovar </button>              

      <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Justificativa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <textarea name="justificativa" rows="4" cols="45" placeholder="Motivo da reprovação...">{{old('justificativa',$vaga->justificativa)}}</textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" value="Reprovada" name="status" class="btn btn-info" onclick="document.getElementById('formStatus').submit()">Reprovar</button>
            </div>
          </div>
        </div>
      </div>
      @endif
      </form>
      <br>
    @endcan
    
    <div class="row">

      <div class="col-sm">
        @if($vaga->justificativa && $vaga->status == 'Reprovada')
        <b>Motivo da reprovação:</b> {{ $vaga->justificativa }}
        <br><br>
        @endif
        <b>Título da Vaga:</b> {{ $vaga->titulo }}
        <br></br>
        <b>Descrição da Vaga:</b> {{ $vaga->descricao }}
        <br></br>
        <b>Benefícios:</b> {{ $vaga->beneficios }}
        <br></br>
        <b>Carga Horária Semanal:</b> {{ $vaga->expediente }} Horas
        <br></br>
        <b>Valor mensal da Bolsa:</b> R$ {{ $vaga->salario }}
        <br></br>
        <b>Horário do Estágio:</b> {{ $vaga->horario }}
        <br></br>
        <b>Divulgar até:</b> {{ $vaga->divulgar_ate }}
        <br></br>
        <b>Contato para vaga:</b> {{ $vaga->contato ?? 'Não informado' }}
        <br></br>
      </div>

    </div>

  </div>
</div>

@endsection('content')
