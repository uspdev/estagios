
<div class="card">
<div class="card-header"><b>Estágio Rescindido</b></div>
<div class="card-body">
    
    <b>Motivo da Rescisão:</b> {{$estagio->rescisao_motivo}} <br>
    <b>Data de Rescisão:</b> {{$estagio->rescisao_data}}<br>

    @can('admin_ou_empresa',$estagio->cnpj)
        <br>
        <a href="/pdfs/rescisao/{{$estagio->id}}" target="_blank" >
        <i class="fas fa-file-pdf"></i> </a>
        Gerar PDF do Termo de Rescisão 
        </a>
        <br>
        <a href="/pdfs/parecer/{{$estagio->id}}"target="_blank" >
        <i class="fas fa-file-pdf"></i> </a>
        Gerar PDF do Parecer de Mérito 
        <br>
        @if(is_null($estagio->renovacao_parent_id))
            <a href="/pdfs/termo/{{$estagio->id}}.pdf" type="application/pdf" target="pdf-frame">
            <i class="fas fa-file-pdf"></i> </a>
            Gerar PDF do Termo de Ciência 
        @else
            <a href="/pdfs/renovacao/{{$estagio->id}}" target="_blank" >
            <i class="fas fa-file-pdf"></i> </a>
            Gerar PDF do Termo de Ciência para Renovação
        @endif  
    @endcan('admin_ou_empresa')
    
</div>  
</div>