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

Enviado para: <b>{{ $estagio->getStatus()[$estagio->status]['name'] }} - 
{{ $estagio->getStatus()[$estagio->status]['optional'] }}
</b>
<br>

Última alteração realizada em: <b>{{ Carbon\Carbon::parse($estagio->updated_at)->format('d/m/Y H:i') }}</b>
<br>

@if($estagio->analise_tecnica_user)
Análise técnica do setor de Graduação realizada por: {{ $estagio->analise_tecnica_user->name  }} <br>
@endif

@if($estagio->analise_academica_user)
Parecer de mérito realizado por: {{ $estagio->analise_academica_user->name }} <br>
@endif

@if($estagio->analise_alteracao_user)
Análise técnica do aditivo de alterações realizada por: {{ $estagio->analise_alteracao_user->name  }}<br>
@endif

<br>

<!--<a href="/pdfs/parecer/{{$estagio->id}}"target="_blank" >
    <i class="fas fa-file-pdf"></i> </a>
     Visualizar PDF do Parecer de Mérito <br>-->

    <a href="/pdfs/termo/{{$estagio->id}}"target="_blank" >
    <i class="fas fa-file-pdf"></i> </a>
     Visualizar PDF do Termo de Ciência
<br>
    <a href="/pdfs/renovacao/{{$estagio->id}}" target="_blank" >
    <i class="fas fa-file-pdf"></i> </a>
    Visualizar PDF do Termo de Ciência para Renovação


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