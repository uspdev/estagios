
<div class="card">
  <div class="card-header">Informações</div>
    <div class="row">
    <div class="col-sm form-group"> 
        <label for="numero_usp" class="required">Número USP: </label>
        <input type="text" class="form-control" id="numero_usp" name="numero_usp" value="{{old('numero_usp',$parecerista->numero_usp)}}">
    </div>
    <div class="col-sm form-group">
        <label for="nome">Nome: </label>
        <input type="text" class="form-control cnpj" id="nome" name="nome" value="{{ old('nome',$parecerista->nome)}}">
    </div>
    <div class="col-sm form-group">
        <label for="acesso_ate">Acesso até: </label>
        <input type="text" class="form-control datepicker" id="acesso_ate" name="acesso_ate" value="{{ old('acesso_ate',$parecerista->acesso_ate)}}">
    </div>
    </div>
</div>
<div class="row">
  <div class="col-sm form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
  </div>
</div>
