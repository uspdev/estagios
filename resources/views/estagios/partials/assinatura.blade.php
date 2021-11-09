<br>
<div style="text-align: center;"><b style="color:red">Aviso Importante:</b> O termo deve ser entregue assinado para a instituição no mínimo 10 dias úteis antes do início do período do estágio no email <b>estagiosfflch@usp.br</b></div>
<br>

@if(!empty($estagio->analise_tecnica))
    <b>Última análise técnica do setor de graduação:</b> {{$estagio->analise_tecnica}}
    <br>
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
<br>

@include('estagios.partials.gerenciar_estagio')

@endcan('admin')
