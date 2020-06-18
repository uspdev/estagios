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
        <div><a href="/enviar_para_analise_tecnica/{{$estagio->id}}" class="btn btn-info"> Enviar para Análise Técnica do <b>Setor de Graduação</b></a></div> <br>
        <div><a href="/estagios/{{$estagio->id}}/edit" class="btn btn-success"> Continuar elaboração</a></div>
        @break

    @case('em_analise_tecnica')
        <div>
            <a href="/indeferimento_analise_tecnica/{{$estagio->id}}" class="btn btn-success"> Indeferir</a>
            <a href="/deferimento_analise_tecnica/{{$estagio->id}}" class="btn btn-info"> deferir</a>
        </div>
        @break

    @default
        <span>Something went wrong, please try again</span>
@endswitch

<br>