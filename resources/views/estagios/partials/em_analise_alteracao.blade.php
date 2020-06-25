
<div class="card">
<div class="card-header"><b>Justificativa para alteração</b></div>
<div class="card-body">

<form method="POST" action="/analise_alteracao/{{$estagio->id}}">
    @csrf
    <div class="row">
        <div class="form-group">
            <textarea name="analise_alteracao" rows="5" cols="60">{{old('analise_alteracao',$estagio->analise_alteracao)}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-info" value="enviar_alteracao">Enviar</button>
    </div>
</form>
<div><a href="/estagios/{{$estagio->id}}/edit" class="btn btn-success">Fazer Alteração</a></div>

</div>
</div>
