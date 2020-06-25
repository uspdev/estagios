@section('styles')
  @parent
  <link rel="stylesheet" type="text/css" href="{{asset('/css/stepper.css')}}">
@endsection('styles')

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

@switch($estagio->status)


    @case('em_elaboracao')
      <div>
        <a href="/enviar_para_analise_tecnica/{{$estagio->id}}" class="btn btn-success">Enviar para Análise Técnica do <b>Setor de Graduação</b></a>
        <a href="/estagios/{{$estagio->id}}/edit" class="btn btn-info">Continuar Elaboração</a>
      </div>   
      @break

    @case('em_analise_tecnica')
      @include('estagios.partials.em_analise_tecnica')
      @break

    @case('em_analise_academica')
      @include('estagios.partials.em_analise_academica')
      @break              

    @case('concluido')
      <div>
        <a href="/renovacao/{{$estagio->id}}" class="btn btn-info">Renovar</a>
        <a href="/iniciar_alteracao/{{$estagio->id}}" class="btn btn-info">Iniciar Alterações</a>
      </div>
      @break 

    @case('em_alteracao')
      @include('estagios.partials.em_analise_alteracao')
      @break  

    @case('em_analise_tecnica_alteracao')
      <div>
        <a href="/indeferimento_analise_tecnica_alteracao/{{$estagio->id}}" class="btn btn-info">Indeferir</a>
        <a href="/deferimento_analise_tecnica_alteracao/{{$estagio->id}}" class="btn btn-success">Deferir</a>
      </div>
      @break 
                   

    @default
        <span>Something went wrong, please try again</span>
@endswitch

<br>