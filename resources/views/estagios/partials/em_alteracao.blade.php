<div class="card">
<div class="card-header"><b>Justificativa para alteração</b></div>
<div class="card-body">

@if(!empty($estagio->analise_alteracao))</b>
    <hr>
    <b>INDEFERIMENTO DO PEDIDO DE ALTERAÇÃO</b> <br>
    <b>Motivo:</b> {{$estagio->analise_alteracao}}<br>
    <hr>
@endif

<form method="POST" action="/enviar_alteracao/{{$estagio->id}}">
    @csrf
    <div class="row">
        <div class="form-group">
            <textarea name="alteracao" rows="5" cols="60">{{old('alteracao',$estagio->alteracao)}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success" name="enviar_analise_tecnica_alteracao" value="deferimento_analise_academica" 
        onClick="return confirm('Tem certeza que deseja enviar a alteração?')">Salvar e Enviar aditivo de alteração para análise</button>
    </div>
    
</form>
<hr>

<form method="POST" action="/estagios/{{$estagio->id}}">
    @csrf
    @method('patch')
    <div class="form-group">
        <button type="submit" class="btn btn-info">Apenas salvar alterações</button>
    </div>
    @include ('estagios.form')
    </form>

</div>
</div>
