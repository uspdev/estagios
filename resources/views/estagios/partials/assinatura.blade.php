<br>
<div style="text-align: center;"><b>Aviso Importante:</b> O termo deve ser entregue assinado para a instituição no mínimo 10 dias úteis antes do início do estágio no email estagiosfflch@usp.br</div>
<br>

@if(!empty($estagio->analise_tecnica))
    <b>Última análise técnica do setor de graduação:</b> {{$estagio->analise_tecnica}}
@endif

@can('admin')

<div class="card">
    <div class="card-header"><b>Ações</b></div> 
    <div class="card-body">
        <a class="btn btn-success" onClick="return confirm('Tem certeza que deseja retornar o estágio para a análise técnica?')" href="/retornar_assinatura/{{$estagio->id}}">
        <i class="fas fa-undo"></i> 
        Retornar estágio para análise técnica </a> <br>
    </div>
</div>

<div class="card">
    <div class="card-header"><b>Gerenciar Parecerista</b></div> 
      <div class="card-body">
        @include('estagios.partials.gerenciar_parecerista')
      </div>
    </div>
</div>    

@endcan('admin')

<!-- -->

@can('empresa',$estagio->cnpj)

        <br>
        @if(is_null($estagio->renovacao_parent_id))
            <a href="/pdfs/termo/{{$estagio->id}}.pdf" type="application/pdf" target="pdf-frame">
            <i class="fas fa-file-pdf"></i> </a>
            Gerar PDF do Termo de Ciência 
        @else
            <a href="/pdfs/renovacao/{{$estagio->id}}" target="_blank" >
            <i class="fas fa-file-pdf"></i> </a>
            Gerar PDF do Termo de Ciência para Renovação
        @endif

@endcan('empresa')