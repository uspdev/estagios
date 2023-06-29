@extends('main')


@section('javascripts_head')
  <script src="{{asset('/js/estagios.js')}}"></script>
@endsection('javascript_head')

@section('content')
 
  <div class="card">
    <div class="card-header"><b>Status do Estágio</b></div>
      <div class="card-body">
        @include('estagios.etapas')
      </div>
    </div>

<br>

  @can('empresa',$estagio->cnpj)
    @if($estagio->status == 'assinatura' | $estagio->status == 'concluido')
      <div class="card">
        <div class="card-header"><b>Gerar Documentos</b></div>
          <div class="card-body">
              @if(is_null($estagio->renovacao_parent_id))
                  <a href="/pdfs/termo/{{$estagio->id}}.pdf" type="application/pdf" target="pdf-frame">
                  <i class="fas fa-file-pdf"></i> </a>
                  Gerar PDF da Declaração de Responsabilidade
              @else
                  <a href="/pdfs/renovacao/{{$estagio->id}}" target="_blank" >
                  <i class="fas fa-file-pdf"></i> </a>
                  Gerar PDF da Declaração de Responsabilidade para Renovação
              @endif

              @if(($estagio->aditivos)->isNotEmpty())
                  <br>
                  <a href="/pdfs/aditivo/{{$estagio->id}}" target="_blank" >
                  <i class="fas fa-file-pdf"></i> </a>
                  Gerar PDF do Parecer de Alteração
              @endif
          </div>
        </div>
      <br>
    @endif
  @endcan('empresa')

  @canany(['admin','empresa','parecerista'])
    <div class="card">
    <div class="card-header"><b>Documentos do Estágio</b></div>
      <div class="card-body">
        @include('files.partials.form')
      </div>
    </div>
  @endcanany
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
    @can('admin',$estagio->cnpj)
    <br>
    <a class="btn btn-danger" onClick="return confirm('Tem certeza que deseja cancelar o estágio?')" href="/cancelar_estagio/{{$estagio->id}}">
        Cancelar Estágio </a>
    @endcan

@endif

@endsection('content')

