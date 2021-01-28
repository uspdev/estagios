<div class="card">
<div class="card-header"><b>Justificativa para alteração</b></div>
<div class="card-body">

@can('admin_ou_empresa',$estagio->cnpj)
<form method="POST" action="/enviar_alteracao/{{$estagio->id}}">
    @csrf
    <div class="row">
        <div class="form-group">
            <textarea name="alteracao" rows="5" cols="60"></textarea>
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-success" name="enviar_analise_tecnica_alteracao" value="enviar_analise_tecnica_alteracao" 
        onClick="return confirm('Tem certeza que deseja enviar a alteração?')">Enviar aditivo de alteração para análise</button>
    </div>

    <br>

    <div>
        <a class="btn btn-info" href="/pdfs/aditivo/{{$estagio->id}}" target="_blank" ><i class="fas fa-file-pdf"></i>  Apenas Gerar PDF de Aditivo</a>
    </div>

</form>
@endcan

</div>
</div>
