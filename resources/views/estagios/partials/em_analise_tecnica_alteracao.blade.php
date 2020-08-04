<div class="card">
<div class="card-header"><b>Análise do pedido de alteração</b></div>
<div class="card-body">

@if(!empty($estagio->alteracao))
    <br>
    <b>Motivo da alteração:</b> {{$estagio->alteracao}}<br>
    <br>
@endif

<hr>

<form method="POST" action="/analise_tecnica_alteracao/{{$estagio->id}}">
    @csrf
    <div class="row">
        <div class="form-group">
            <label for="analise_alteracao"><b>Explicação em caso de indeferimento do pedido de alteração: </b></label><br>
            <textarea name="analise_alteracao" rows="5" cols="60">{{old('analise_alteracao',$estagio->analise_alteracao)}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-info" name="analise_tecnica_alteracao_action" value="indeferimento_analise_tecnica_alteracao">Indeferir</button>
        <button type="submit" class="btn btn-success" name="analise_tecnica_alteracao_action" value="deferimento_analise_tecnica_alteracao">Deferir</button>
    </div>

</form>           