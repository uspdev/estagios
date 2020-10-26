Enviar documentos (Apenas arquivos em formato PDF):

<form method="post" enctype="multipart/form-data" action="/files/store">
    @csrf 
    <input type="hidden" name="estagio_id" value="{{ $estagio->id }}">
    <input type="file" name="file">
    <button type="submit" class="btn btn-success"> Enviar </button>
</form>    
