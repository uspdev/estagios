
<div class="card">
<div class="card-header"><b>Estágio Rescindido</b></div>
<div class="card-body">
    
    <b>Motivo da Rescisão:</b> {{$estagio->rescisao_motivo}} <br>
    <b>Data de Rescisão:</b> {{$estagio->rescisao_data}}

<!-- -->

@can('empresa',$estagio->cnpj)

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
    
    </div> 


@endcan('empresa')

<!-- -->

@can('admin')

        
        <br><br>
        Relatório final do estágio:
        <table class="table table-striped">
            @foreach($estagio->arquivos as $arquivo)
                @if($arquivo->tipo_documento == 'Relatorio')
                <tr>
                <td>            
                <a href="/files/{{$arquivo->id}}.pdf" type="application/pdf" target="pdf-frame"><i class="fas fa-file-pdf"></i> {{$arquivo->original_name}} </a>
                </td>
                <td>
                    <form method="post" action="/files/{{$arquivo->id}}">         
                        @csrf
                        @method('delete')
                        <button class="botao" type="submit" onclick="return confirm('Tem certeza que deseja deletar?');"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    <div>
                </td>
                </tr>
                @endif
            @endforeach
        </table>

        <br>
        @if(($estagio->avaliacao_empresa)!=null)
        <b>Avaliação do relatório final pelo parecerista: </b> {{$estagio->avaliacao_empresa}}<br>
        <b>Justificativa do parecerista: </b> {{$estagio->avaliacaodescricao}}<br><br>
        @endif
    
        <form method="POST" action="/renovacao/{{$estagio->id}}">
        @csrf
            <a class="btn btn-warning" onClick="return confirm('Tem certeza que deseja reativar o estágio?')" href="/retornar_rescisao/{{$estagio->id}}">
            <i class="fas fa-undo"></i>Reativar estágio </a> 

            <a class="btn btn-info" onClick="return confirm('Tem certeza que deseja um email para a empresa?')" 
            href="/emails/rescisao_empresa/{{$estagio->id}}"><i class="fas fa-envelope-open-text"></i>  Enviar email de aviso para a empresa</a>
                 
        </form>
        <br><br>

        @include('estagios.partials.gerenciar_estagio')

    </div> 

@endcan('admin')

</div>  