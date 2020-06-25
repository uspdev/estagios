
<div class="card">
<div class="card-header"><b>Justificativa da análise acadêmica</b></div>
<div class="card-body">

<form method="POST" action="/analise_academica/{{$estagio->id}}">
    @csrf
    <div class="row">
        <div class="form-group">
            <textarea name="analise_academica" rows="5" cols="60">{{old('analise_academica',$estagio->analise_academica)}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-info" name="analise_academica_action" value="indeferimento_analise_academica">Indeferir</button>
        <button type="submit" class="btn btn-success" name="analise_academica_action" value="deferimento_analise_academica">Deferir</button>
    </div>

</form>

</div>
</div>
