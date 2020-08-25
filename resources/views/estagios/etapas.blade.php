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

Última alteração realizada em: <b>{{ Carbon\Carbon::parse($estagio->updated_at)->format('d/m/Y H:i') }}</b>
<br>
Enviado para: <b>{{ $estagio->getStatus()[$estagio->status]['name'] }} - 
{{ $estagio->getStatus()[$estagio->status]['optional'] }}
</b>
<br>
{{ $estagio->analise_academica_user->name }}

<br><br>

@switch($estagio->status)

    @case('em_elaboracao')
      @include('estagios.partials.em_elaboracao')
      @break

    @case('em_analise_tecnica')
      @include('estagios.partials.em_analise_tecnica')
      @break

    @case('em_analise_academica')
      @include('estagios.partials.em_analise_academica')
      @break              

    @case('concluido')
    @include('estagios.partials.concluido')
      @break 

    @case('em_alteracao')
      @include('estagios.partials.em_alteracao')
      @break  

    @case('em_analise_tecnica_alteracao')
      @include('estagios.partials.em_analise_tecnica_alteracao')
      @break 

    @case('rescisao')
      @include('estagios.partials.rescisao')
      @break                    

    @default
        <span>Something went wrong, please try again</span>
@endswitch

<br>
</b>