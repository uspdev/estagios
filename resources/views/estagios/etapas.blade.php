@section('styles')
  @parent
  <link rel="stylesheet" type="text/css" href="{{asset('/css/stepper.css')}}">
@endsection('styles')

@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

<div class="md-stepper-horizontal orange">

    @foreach ($estagio->getStatus() as $key => $status)
      <div class="md-step editable
        @if($estagio->status == $key) 
          active
        @else
          next
        @endif
      ">
        <a href="#">
          <div class="md-step-circle"><span></span></div>
          <div class="md-step-title">{{ $status['name'] }}</div>
          <div class="md-step-optional">{{ $status['optional'] }}</div>
        </a>
        <div class="md-step-bar-left"></div>
        <div class="md-step-bar-right"></div>
      </div>
    @endforeach

  </div>

@if($estagio->last_status)
  <div class="text-warning bg-info text-center">
  Último Status: <b>{{ $estagio->getStatus()[$estagio->last_status]['name'] }} </b> <br>
  Status Atual: <b>{{ $estagio->getStatus()[$estagio->status]['name'] }} </b>
  </b>
  <br>
  Última mudança realizada em: <b>{{ Carbon\Carbon::parse($estagio->updated_at)->format('d/m/Y H:i') }}</b>
  </div>
  <br>
@endif

@if($estagio->analise_tecnica_user)
Análise técnica do setor de Graduação realizada por: {{ $estagio->analise_tecnica_user->name  }} <br>
@endif

@if($estagio->analise_academica_user)
  Parecer de mérito realizado por: <b>{{$estagio->analise_academica_user->name}}</b>
  @can('parecerista')
          <a class="btn btn-info" onClick="return confirm('Tem certeza que deseja editar o parecer de mérito?')" href="/editar_analise_academica/{{$estagio->id}}">
          <i class="far fa-edit"></i> 
          Editar parecer de mérito </a> <br>
  @endcan('parecerista')
  Status do deferimento do parecer de mérito:<b>{{$estagio->tipodeferimento}}</b>
@endif
<br>
@if($estagio->analise_alteracao_user)
Análise técnica do aditivo de alterações realizada por: {{ $estagio->analise_alteracao_user->name  }}<br>
@endif

<br> 

@switch($estagio->status)

    @case('em_elaboracao')
      @include('estagios.partials.em_elaboracao')
      @break

    @case('em_analise_tecnica')

      @include('estagios.partials.em_analise_tecnica')
      @break

    @case('em_analise_academica')
      @if(($estagio->numparecerista)!=null)
      <b>Aguardando parecer de mérito de:</b>
          <br>
          <b>Nome:</b> {{Uspdev\Replicado\Pessoa::dump($estagio->numparecerista)['nompes']}}<br>
          <b>Email Cadastrado:</b> {{Uspdev\Replicado\Pessoa::email($estagio->numparecerista)}}</b><br>
                 
      @endif
      @can('admin')
      <div class="card">
          <div class="card-header"><b>Área de Administrador</b></div> 
            <div class="card-body">
              @include('estagios.partials.gerenciar_parecerista')
            </div>
          </div>
      </div>
      <div class="card">
              <div class="card-header"><b>Retornar Estágio</b></div> 
              <div class="card-body">
                      <a class="btn btn-success" onClick="return confirm('Tem certeza que deseja retornar o estágio para a etapa anterior?')" href="/voltar_analise_academica/{{$estagio->id}}">
                      <i class="fas fa-undo"></i> 
                      Retornar estágio para etapa anterior </a> <br>
              </div>
      </div>

      @endcan('admin')
      @include('estagios.partials.em_analise_academica')
      @break              

    @case('assinatura')
    @include('estagios.partials.assinatura')
      @break

    @case('concluido')

    @include('estagios.partials.concluido')
      @break 

    @case('em_alteracao')
      @include('estagios.partials.em_alteracao')
      @break  

    @case('rescisao')
      @include('estagios.partials.rescisao')
      @break                    

    @default
        <span>Something went wrong, please try again</span>
@endswitch

<br>
</b>