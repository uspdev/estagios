@if(!empty($estagio->analise_alteracao))
    <br>
    <b>Motivo do indeferimento da alteração:</b> {{$estagio->analise_alteracao}}
    <b>Parecerista:</b> {{App\User::find($estagio->analise_alteracao_user_id)->name}} <br> 
    <br><br>
@endif

<div class="card">
<div class="card-header"><b>Justificativa para alteração</b></div>
<div class="card-body">

<form method="POST" action="/analise_tecnica/{{$estagio->id}}">
    <div class="form-group">
        <button type="submit" class="btn btn-info" value="enviar_alteracao" 
        onClick="return confirm('Tem certeza que deseja enviar a alteração?')">Enviar</button>
    </div>
</form>
<div><a href="/estagios/{{$estagio->id}}/edit" class="btn btn-success">Fazer Alteração</a></div>

</div>
</div>
