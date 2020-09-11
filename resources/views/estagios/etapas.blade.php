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
Parecer de mérito realizado por: <b>{{$estagio->analise_academica_user->name}}</b> <br>
Status do deferimento do parecer de mérito:<b>{{$estagio->tipodeferimento}}</b> <br>
@endif

@if($estagio->analise_alteracao_user)
Análise técnica do aditivo de alterações realizada por: {{ $estagio->analise_alteracao_user->name  }}<br>
@endif

@if(($estagio->desempenhoacademico)!=null)
<br>
    <a href="/pdfs/parecer/{{$estagio->id}}"target="_blank" >
    <i class="fas fa-file-pdf"></i> </a>
    Visualizar PDF do Parecer de Mérito 
@endif
<br>
    <a href="/pdfs/termo/{{$estagio->id}}"target="_blank" >
    <i class="fas fa-file-pdf"></i> </a>
     Visualizar PDF do Termo de Ciência
<br>
    <a href="/pdfs/renovacao/{{$estagio->id}}" target="_blank" >
    <i class="fas fa-file-pdf"></i> </a>
    Visualizar PDF do Termo de Ciência para Renovação   
<br><br>
    <a onClick="return confirm('Tem certeza que deseja um email para a empresa?')" href="/emails/enviar_para_analise_tecnica/{{$estagio->id}}">
    <i class="fas fa-envelope-open-text"></i> </a>
    Enviar E-mail contendo Termo de Ciência e Termo de Ciência para Renovação para a empresa   
<br><br> 

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
          <div class="card-header"><b>Gerenciar Parecerista</b></div> 
            <div class="card-body">
              @include('estagios.partials.gerenciar_parecerista')
            </div>
          </div>
      </div>
      @endcan('admin')


      @include('estagios.partials.em_analise_academica')
      @break              

    @case('concluido')

      @can('parecerista')
      <a onClick="return confirm('Tem certeza que deseja editar o parecer de mérito?')" href="/editar_analise_academica/{{$estagio->id}}">
      <i class="far fa-edit"></i> </a>
      Editar Parecer de Mérito
      @endcan('parecerista')

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