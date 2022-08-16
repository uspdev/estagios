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
      <label for="expediente" class="required"><strong>Carga Horária Semanal (Somente o Número):</strong></label>
      <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" 
      class="form-control" id="expediente" name="expediente" value="{{old('expediente',$vaga->expediente)}}">
    </div>
    <div class="col-sm form-group">
      <label for="salario" class="required"><strong>Valor mensal da Bolsa (Somente o Número):</strong></label>
      <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" 
      class="form-control" id="salario" name="salario" width="190" value="{{old('salario',$vaga->salario)}}">
    </div>
    <div class="col-sm form-group">
      <label for="horario" class="required"><strong>Horário do Estágio:</strong></label>
      <input type="text" class="form-control" id="horario" name="horario" width="190" value="{{old('horario',$vaga->horario)}}">
    </div>
    <div class="col-sm form-group">
      <label for="divulgar_ate" class="required"><strong>Divulgar até:</strong></label>
      <input type="text" class="form-control datepicker" id="divulgar_ate" name="divulgar_ate" value="{{old('divulgar_ate',$vaga->divulgar_ate)}}">
    </div>
  </div>

  <div class="row">
    <div class="col-sm form-group">
      <label for="contato" class="required"><strong>Contato para Vaga:</strong></label>
      <textarea class="form-control" name="contato">{{old('contato',$vaga->contato)}}</textarea>
      <small> Emails, sites ou telefones no qual alunos e alunas devem entrar em contato</small>
    </div>
  </div>

  <div class="row">
      <div class="col-sm-4 form-group">
        <label for="email" class="required"><strong>E-mail para vaga: </strong></label>
        <input type="email" maxlength="128" class="form-control" id="email" name="email" value="{{old('email',$vaga->email)}}">
      </div>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
  </div>
  
  </div>
</div>