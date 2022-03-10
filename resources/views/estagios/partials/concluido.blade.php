@can('admin')
@include('estagios.partials.gerenciar_estagio')

    <br>
    <form method="POST" action="/mover_analise_tecnica/{{$estagio->id}}">
    @csrf
        <button type="submit" class="btn btn-info" name="rescisao_action" value="rescisao"
                onClick="return confirm('Tem certeza que deseja mover estágio para análise técnica?')" >
                Mover estágio para análise técnica
        </button>
    </form>

@endcan

@can('admin_ou_empresa',$estagio->cnpj)
</div></div>
<br>

<div>
    <div class="card">
    <div class="card-header"><b>EM CASO DE RESCISÃO</b></div>
    <div class="card-body">

    <form method="POST" action="/rescisao/{{$estagio->id}}">
    @csrf
        <div class="form-group">
            <label for="rescisao_motivo" class="required"><b>Justificativa: </b></label><br>
            <textarea name="rescisao_motivo" rows="5" cols="60">{{old('rescisao_motivo',$estagio->rescisao_motivo)}}</textarea>
        </div>
        <div class="form-group">
            <label for="rescisao_data" class="required"><b>Data de Rescisão: </b></label>
            <input type="text" class="form-control datepicker" name="rescisao_data">{{old('rescisao_data',$estagio->rescisao_data)}}</textarea>
        </div>
    <button type="submit" class="btn btn-success" name="rescisao_action" value="rescisao"
            onClick="return confirm('Tem certeza que deseja rescindir o estágio?')" >
            Enviar Pedido de Rescisão
    </button>
    </form>
    </div></div> <br>

    <div class="card">
    <div class="card-header"><b>EM CASO DE ALTERAÇÃO</b></div>
    <div class="card-body">

    <a href="/iniciar_alteracao/{{$estagio->id}}" class="btn btn-info" onClick="return confirm('Tem certeza que deseja iniciar o processo de alterações?')">Solicitar Aditivo de Alterações</a>

    </div> <br>

</div><br>
@endcan

<div class="card">
    <div class="card-header"><b>EM CASO DE RENOVAÇÃO</b></div>
    <div class="card-body">

    @can('admin_ou_empresa',$estagio->cnpj)

        <b>Aviso:</b> Para que possa ser realizado o pedido de renovação do estágio, é necessário que o próprio estagiário faça a entrega
        do relatório final ao setor de estágios. <b>O relatório final é pessoal e livre do aluno</b>, e seu upload no sistema só pode
        ser feito pelo próprio setor de estágios. A opção de envio de relatório na área de Documentos do Estágio serve apenas para o envio
        de relatórios parciais.
        <br><br>

        <form method="POST" action="/renovacao/{{$estagio->id}}">
                @csrf
                <button type="submit" class="btn btn-info" name="rescisao_action" value="rescisao"
                    onClick="return confirm('Tem certeza que deseja renovar o estágio?')" >
                    Enviar Pedido de Renovação
                </button>
        </form>

    @endcan('admin_ou_empresa',$estagio->cnpj)


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
            <b>Justificativa do parecerista: </b> {{$estagio->avaliacaodescricao}}<br><br>
            @endif

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

</div></div>


