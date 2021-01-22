
<div class="card">
<div class="card-header"><b>Estágio Rescindido</b></div>
<div class="card-body">
    
    <b>Motivo da Rescisão:</b> {{$estagio->rescisao_motivo}} <br>
    <b>Data de Rescisão:</b> {{$estagio->rescisao_data}}<br>

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
        <br><br>  

@endcan('empresa')

<!-- -->

@can('admin')

        <br>
        Enviar relatório final (Apenas arquivos em formato PDF):

        <form method="post" enctype="multipart/form-data" action="/files/store_relatorio">
            @csrf 
            <div class="col-sm form-group">
                <input type="hidden" name="estagio_id" value="{{ $estagio->id }}">
                <input type="file" name="file">
                <br><hr>
                <label for="original_name" class="required">Nome do Arquivo: </label>
                <input type="text" class="form-control" id="original_name" name="original_name">
                <br>
                <button type="submit" class="btn btn-success"> Enviar </button>
            </div>
        </form>   

        <br><br>
        Relatório Final:
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
        <b>Avaliação do relatório pelo parecerista: </b> {{$estagio->avaliacao_empresa}}<br>
        <b>Justificativa do parecerista: </b> {{$estagio->avaliacaodescricao}}<br>
        @endif

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
        <br><br>  

        <a class="btn btn-warning" onClick="return confirm('Tem certeza que deseja reativar o estágio?')" href="/retornar_rescisao/{{$estagio->id}}">
        <i class="fas fa-undo"></i> 
        Reativar estágio </a> 
        <a class="btn btn-info" onClick="return confirm('Tem certeza que deseja um email para a empresa?')" 
        href="/emails/analise_rescisao/{{$estagio->id}}"><i class="fas fa-envelope-open-text"></i>  Enviar email de aviso para o parecerista</a>
        <br>

@endcan('admin')

<!-- -->
    
@can('parecerista')

        <br>
        @if(($estagio->avaliacao_empresa)!=null)
        <b>Avaliação do relatório: </b> {{$estagio->avaliacao_empresa}}<br>
        <b>Justificativa: </b> {{$estagio->avaliacaodescricao}}<br>
        @endif

        <br>
        <b>Relatório Final do Aluno:</b>
        <table class="table table-striped">
            @foreach($estagio->arquivos as $arquivo)
                @if($arquivo->tipo_documento == 'Relatorio')
                    <tr>
                    <td>            
                    <a href="/files/{{$arquivo->id}}.pdf" type="application/pdf" target="pdf-frame"><i class="fas fa-file-pdf"></i> {{$arquivo->original_name}} </a>
                    </td>
                    </tr>
                @endif
            @endforeach
        </table>

        <form method="POST" action="/avaliacao/{{$estagio->id}}">
            @csrf
            <label for="condicaodeferimento">Avalie o caráter do relatório: </label> 
                <select name="avaliacao_empresa" class="form-control" id="avaliacao_empresa">
                    <option value="" selected="">- Selecione -</option>
                            @foreach ($estagio->avaliacao_empresaOptions() as $option)
                            @if (old('avaliacao_empresa') == '' and isset($estagio->avaliacao_empresa) )
                    <option value="{{$option}}" {{ ( $estagio->avaliacao_empresa == $option) ? 'selected' : ''}}>
                            {{$option}}
                    </option>
                            @else
                    <option value="{{$option}}" {{ ( old('avaliacao_empresa') == $option) ? 'selected' : ''}}>
                            {{$option}}
                    </option>
                        @endif
                        @endforeach
                </select>  
                <br>
                <div class="form-group">
                    <label for="avaliacaodescricao" class="required">Justifique a avaliação: </label>
                    <input type="text" class="form-control" id="avaliacaodescricao" name="avaliacaodescricao" value="{{old('avaliacaodescricao',$estagio->avaliacaodescricao)}}">
                </div>
                <br>

                <button type="submit" class="btn btn-success"> Enviar Avaliaçao </button>
            </div>
        </form>



@endcan('parecerista')

</div>  
</div>