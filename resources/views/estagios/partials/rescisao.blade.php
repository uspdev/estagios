
<div class="card">
<div class="card-header"><b>Estágio Rescindido</b></div>
<div class="card-body">
    
    <b>Motivo da Rescisão:</b> {{$estagio->rescisao_motivo}} <br>
    <b>Data de Rescisão:</b> {{$estagio->rescisao_data}}<br>

    @can('admin')
        <br>
        <a href="/pdfs/rescisao/{{$estagio->id}}" target="_blank" >
        <i class="fas fa-file-pdf"></i> </a>
        Gerar PDF do Termo de Rescisão 
        </a>
    @endcan('admin')
    
</div>  
</div>