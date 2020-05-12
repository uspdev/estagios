<div class="card">
  <div class="card-header"><h3>Cadastro de Vaga</h3></div>
  <div class="card-body">
    <div class="row">
    <div class="col-sm form-group">
      <label for="titulo" class="required"><strong>Título da Vaga:</strong></label>
      <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo',$vaga->titulo)}}">
    </div>
  </div>

  <div class="row">
    <div class="col-sm form-group">
      <label for="descricao" class="required"><strong>Descrição da Vaga:</strong></label>
      <textarea class="form-control" id="descricao" name="descricao">{{old('descricao',$vaga->descricao)}}</textarea>
    </div>
    <div class="col-sm form-group">
      <label for="beneficios" class="required"><strong>Benefícios:</strong></label>
      <textarea class="form-control" id="beneficios" name="beneficios">{{old('beneficios',$vaga->beneficios)}}</textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-sm form-group">
      <label for="expediente" class="required"><strong>Carga Horário Semanal:</strong></label>
      <input type="text" class="form-control" id="expediente" name="expediente" value="{{old('expediente',$vaga->expediente)}}">
    </div>
    <div class="col-sm form-group">
      <label for="salario" class="required"><strong>Valor mensal da Bolsa:</strong></label>
      <input type="text" class="form-control" id="salario" name="salario" placeholder="R$ 1000,00" width="190" value="{{old('salario',$vaga->salario)}}">
    </div>
    <div class="col-sm form-group">
      <label for="horario" class="required"><strong>Horário do Estágio:</strong></label>
      <input type="text" class="form-control" id="horario" name="horario" width="190" value="{{old('horario',$vaga->horario)}}">
    </div>
  </div>

  <div class="row">
    <div class="col-sm form-group">
      <label for="divulgar_ate" class="required"><strong>Divulgar até:</strong></label>
      <input type="text" class="form-control datepicker" id="divulgar_ate" name="divulgar_ate" value="{{old('divulgar_ate',$vaga->divulgar_ate)}}">
    </div>
  </div>

  <div class="row">  
    <div class="col-sm form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>
  </div>
    
  </div>
</div>