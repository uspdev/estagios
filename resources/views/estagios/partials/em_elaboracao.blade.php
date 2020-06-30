<div>
    <a href="/enviar_para_analise_tecnica/{{$estagio->id}}" class="btn btn-success" onClick="return confirm('Tem certeza que quer enviar para o Setor de Graduação?')">
        Enviar para Análise Técnica do <b>Setor de Graduação</b>
    </a>

    <a href="/estagios/{{$estagio->id}}/edit" class="btn btn-info">Continuar Elaboração</a>
    @if(!empty($estagio->analise_tecnica))
        <br><br>
        <b>Análise técnica:</b> {{$estagio->analise_tecnica}}
    @endif
</div>   