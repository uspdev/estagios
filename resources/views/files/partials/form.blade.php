@can('admin_ou_empresa',$estagio->cnpj)

<div class="row">
    <div class="col-4 form-group">

        Enviar documentos (Apenas arquivos em formato PDF):

        <form method="post" enctype="multipart/form-data" action="/files/store">
            @csrf 
            <input type="hidden" name="estagio_id" value="{{ $estagio->id }}">
            <input type="file" name="file">
            <br><hr>
            <label for="original_name" class="required">Nome do Arquivo: </label>
            <input type="text" class="form-control" id="original_name" name="original_name">
            <br>
            <button type="submit" class="btn btn-success"> Enviar </button>
        </form>   

    </div>
    <div class="col-8 form-group">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Arquivo</th>
                    @can('admin')
                    <th>Ações</th>
                    @endcan('admin')
                </tr>
                </thead>
                <tbody>
                @foreach($estagio->arquivos as $arquivo)
                @if($arquivo->tipo_documento != 'Relatorio')
                    <tr>
                    <td>            
                    <a href="/files/{{$arquivo->id}}.pdf" type="application/pdf" target="pdf-frame"><i class="fas fa-file-pdf"></i> {{$arquivo->original_name}} </a>
                    </td>
                    @can('admin')
                        <td>
                            <form method="post" action="/files/{{$arquivo->id}}">         
                                @csrf
                                @method('delete')
                                <button class="botao" type="submit" onclick="return confirm('Tem certeza que deseja deletar?');"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            <div>
                        </td>
                    @endcan('admin')
                    </tr>
                @endif    
                @endforeach
                </tbody>
            </table>

    </div>

</div>
@endcan

@can('parecerista')
<hr>
<div class="row">

<table class="table table-striped">
    @foreach($estagio->arquivos as $arquivo)
        <tr>
        <td>            
        <a href="/files/{{$arquivo->id}}.pdf" type="application/pdf" target="pdf-frame"><i class="fas fa-file-pdf"></i> {{$arquivo->original_name}} </a>
        </td>
        </tr>
    @endforeach
</table>

</div>

@endcan