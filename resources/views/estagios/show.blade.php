@section('javascripts_head')
  <script src="{{asset('/js/estagios.js')}}"></script>
@endsection('javascript_head')

@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<div class="card">
  <div class="card-header"><b>Status do Estágio</b></div>
    <div class="card-body">
      @include('estagios.etapas')
  </div>
</div>

<br>

@can('empresa',$estagio->cnpj)
  @if($estagio->status == 'assinatura' | $estagio->status == 'concluido')
  <div class="col-sm-12">
      <div class="card">
        <div class="card-header"><b>Gerar Documentos</b></div>
          <div class="card-body">
              @if(is_null($estagio->renovacao_parent_id))
                  <a href="/pdfs/termo/{{$estagio->id}}.pdf" type="application/pdf" target="pdf-frame">
                  <i class="fas fa-file-pdf"></i> Gerar Termo de Ciência </a>                    
              @else
                  <a href="/pdfs/renovacao/{{$estagio->id}}" target="_blank" >
                  <i class="fas fa-file-pdf"></i> Gerar Termo de Ciência para Renovação </a>                    
              @endif

              @if(($estagio->aditivos)->isNotEmpty())
                  <br>
                  <a href="/pdfs/aditivo/{{$estagio->id}}" target="_blank" >
                  <i class="fas fa-file-pdf"></i> Gerar Parecer de Alteração </a>                    
              @endif
        </div>
      </div><br>
  </div>
  <br>
  @endif
@endcan('empresa')

<br>

@can('admin')
<form method="GET" action="/editar/{{$estagio->id}}">
  @csrf
  <div class="form-group">
      <button type="submit" class="btn btn-info" name="enviar_para_analise_tecnica" value="apenas_salvar_renovacao">
      Editar informações do estágio
      </button>
    </div>
</form>
@endcan('admin')

@include('estagios.partials.informacoes')

@if(! in_array($estagio->status,['analise_alteracao_parecerista','rescisao','cancelado']))
    @can('admin_ou_empresa',$estagio->cnpj)
    <br>
    <div class="col-sm-12">
      <a class="btn btn-danger" onClick="return confirm('Tem certeza que deseja cancelar o estágio?')" href="/cancelar_estagio/{{$estagio->id}}">
          Cancelar Estágio </a>
    </div>
    @endcan
@endif

@endsection('content')

