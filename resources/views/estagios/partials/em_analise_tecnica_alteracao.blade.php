<div class="card">
<div class="card-header"><b>Justificativa em caso de indeferimento da alteração</b></div>
<div class="card-body">

<form method="POST" action="/analise_alteracao/{{$estagio->id}}">
    @csrf
    <div class="row">
        <div class="form-group">
            <textarea name="analise_alteracao" rows="5" cols="60">{{old('analise_alteracao',$estagio->analise_alteracao)}}</textarea>
        </div>
    </div>

<div>
    <a href="/indeferimento_analise_tecnica_alteracao/{{$estagio->id}}" class="btn btn-info" onClick="return confirm('Tem certeza que deseja indeferir as alterações')">Indeferir</a>
    <a href="/deferimento_analise_tecnica_alteracao/{{$estagio->id}}" class="btn btn-success" onClick="return confirm('Tem certeza que deseja deferir as alterações')">Deferir</a>
</div>