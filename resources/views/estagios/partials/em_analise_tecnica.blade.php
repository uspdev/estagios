
<form method="POST" action="/analise_tecnica/{{$estagio->id}}">
    @csrf
    <div class="row">
        <div class="form-group">
            <div><label for="analise_tecnica"><b> Justificativa da análise técnica </b></label><div>
            <textarea name="analise_tecnica" rows="5" cols="60">{{old('analise_tecnica',$estagio->analise_tecnica)}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success" name="analise_tecnica_action" value="indeferimento_analise_tecnica">Indeferir</button>
        <button type="submit" class="btn btn-info" name="analise_tecnica_action" value="deferimento_analise_tecnica">Deferir</button>
    </div>

</form>