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
        <button type="submit" class="btn btn-success" name="enviar_analise_tecnica_alteracao" value="enviar_analise_tecnica_alteracao" 
        onClick="return confirm('Tem certeza que deseja enviar a alteração?')">Salvar e Enviar aditivo de alteração para análise</button>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-info" name="enviar_analise_tecnica_alteracao" value="apenas_salvar">Apenas salvar alterações</button>
    </div>
    @include ('estagios.form')
    </form>

</div>
</div>
