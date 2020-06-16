@section('styles')
  @parent
  <link rel="stylesheet" type="text/css" href="{{asset('/css/stepper.css')}}">
@endsection('styles')

{{$estagio->tipo}}
{{$estagio->tipo}}

<div class="md-stepper-horizontal orange">

    <div class="md-step done">
      <a href="#">
        <div class="md-step-circle"><span></span></div>
        <div class="md-step-title"> Em elaboração</div>
        <div class="md-step-optional">Empresa</div>
      </a>
      <div class="md-step-bar-left"></div>
      <div class="md-step-bar-right"></div>
    </div>

    <div class="md-step editable active">
      <a href="#">
        <div class="md-step-circle"><span></span></div>
        <div class="md-step-title">Análise</div>
        <div class="md-step-optional">Comissão de Graduação</div>
      </a>
      <div class="md-step-bar-left"></div>
      <div class="md-step-bar-right"></div>
    </div>
    
    <div class="md-step editable next">
      <div class="md-step-circle"><span></span></div>
      <div class="md-step-title">Parecer</div>
      <div class="md-step-optional">Coordenador(a)</div>
      <div class="md-step-bar-left"></div>
      <div class="md-step-bar-right"></div>
    </div>

    <div class="md-step editable next">
      <div class="md-step-circle"><span></span></div>
      <div class="md-step-title">Parecer</div>
      <div class="md-step-optional">Coordenador(a)</div>
      <div class="md-step-bar-left"></div>
      <div class="md-step-bar-right"></div>
    </div>
    
  </div>