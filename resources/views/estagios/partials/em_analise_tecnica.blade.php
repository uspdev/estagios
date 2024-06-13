<br>
<div style="text-align: center;"><b style="color:red">Aviso Importante:</b> O termo deve ser entregue assinado para a instituição no mínimo 10 dias úteis antes do início do período do estágio no email <b>{{ $settings->email }}</b></div>
<br>

@can('admin')

<div class="card">
<div class="card-header"><b>Justificativa da análise técnica</b></div>
<div class="card-body">

<form method="POST" action="/analise_tecnica/{{$estagio->id}}">
    @csrf
    <details>
        <summary>Clique aqui para visualizar mais informações sobre a matricula vigente</summary>
        <br>
        @include('estagios.partials.jupiter')
    </details>

    <br>    

    <div class="form-group">
        <textarea name="analise_tecnica" rows="5" cols="60">{{old('analise_tecnica',$estagio->analise_tecnica)}}</textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-info" name="analise_tecnica_action" value="indeferimento_analise_tecnica">
            Devolver para empresa
        </button>

        <button type="submit" class="btn btn-success" name="analise_tecnica_action" value="enviar_assinatura"
            onClick="return confirm('Tem certeza que quer enviar para Assinatura?')" >
            Enviar para assinatura
        </button>

        <button type="submit" class="btn btn-success" name="analise_tecnica_action" value="deferimento_analise_tecnica"
            onClick="return confirm('Tem certeza que quer enviar para Parecer?')" >
            Enviar para parecerista
        </button>
        
        <button type="submit" class="btn btn-warning" name="analise_tecnica_action" value="concluir">Concluir Estágio </button>
    </div>

</form>

@endcan('admin')

@include('estagios.partials.gerenciar_estagio')

<br>

@can('admin_ou_empresa')

@foreach($estagio->aditivos->where('aprovado_graduacao','=',0)->where('comentario_graduacao','=',null) as $aditivo)
<b>Opções de Aditivo Pendente</b>
<form method="GET" action="/pdfs/aditivo/{{$estagio->id}}">
    @csrf
    <button type="submit" class="btn btn-info" name="aditivo_action" value="pendente">
        <i class="fas fa-file-pdf"></i> Gerar PDF com requisição do Aditivo
    </button>
</form>

@endforeach

@endcan('admin_ou_empresa')

<br>

</div>  
</div>
