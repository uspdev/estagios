
<div class="card">
<div class="card-header"><b>Estágio Rescindido</b></div>
<div class="card-body">
    
    <b>Motivo da Rescisão:</b> {{$estagio->rescisao_motivo}} <br>
    <b>Data de Rescisão:</b> {{$estagio->rescisao_data}}<br><br>


    <!-- BOTÃO TEMPORARIO PARA FACILITAR OS TESTES -->
    <a href="/reiniciar_estagio/{{$estagio->id}}" class="btn btn-success" onClick="return confirm('Tem certeza que deseja iniciar um novo processo de estágio?')">
        Iniciar novo processo de estágio
    </a>
    <!---->

    <a href="/pdfs/rescisao/{estagio}/{empresa}" class="btn btn-success" target="_blank" >
    Gerar PDF do Termo de Rescisão
    </a>
    
</div>  
</div>