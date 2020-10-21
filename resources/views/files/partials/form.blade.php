Enviar documentos:

<form method="post" enctype="multipart/form-data" action="/files/store">
    @csrf 
    <input type="hidden" name="id_arquivo" value="{{ $estagio->id }}">
    <input type="file" name="file">
    <button type="submit" class="btn btn-success"> Enviar </button>
</form>    
