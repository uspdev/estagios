<div class="card">
  <div class="card-header"><h4>Representante legal da Empresa que irá assinar o Termo de Convênio</h4></div>
    <div class="card-body">  

      <div class="form-group row">
        <label for="cnpj" class="required col-sm-2 col-form-label"><b>CNPJ </b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control cnpj" id="cnpj" name="cnpj" placeholder="00.000.000/0000-00" value="{{old('cnpj',$convenio->cnpj)}}">
        </div>
      </div>
        
      <div class="form-group row">
        <label for="nome_representante" class="required col-sm-2 col-form-label">Nome:</label>
        <div class="col-sm-10">
          <input type="text" name="nome_representante" class="form-control" id="nome_representante" placeholder="Insira seu nome completo" value="{{old('nome_representante',$convenio->nome_representante)}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="cargo_representante" class="required col-sm-2 col-form-label">Cargo:</label>
        <div class="col-sm-10">
          <input type="text" name="cargo_representante" class="form-control" id="cargo_representante" placeholder="Insira seu cargo" value="{{old('cargo_representante',$convenio->cargo_representante)}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="email_representante" class="required col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-10">
          <input type="email" name="email_representante" class="form-control" id="email_representante" placeholder="Insira seu email" value="{{old('email_representante',$convenio->email_representante)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="rg_representante" class="required col-sm-2 col-form-label">RG:</label>
        <div class="col-sm-10">
          <input type="text" name="rg_representante" class="form-control" id="rg_representante" placeholder="Insira seu RG" value="{{old('rg_representante',$convenio->rg_representante)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="cpf_representante" class="required col-sm-2 col-form-label">CPF:</label>
        <div class="col-sm-10">
          <input type="text" name="cpf_representante" class="cpf form-control" id="cpf_representante" placeholder="Insira seu CPF (SOMENTE NÚMEROS)" value="{{old('cpf_representante',$convenio->cpf_representante)}}">
        </div>
      </div>

  </div>  
</div>
</br>
 <div class="card">
  <div class="card-header"><h4>Preencher caso haja mais Representates legais da Empresa</h4></div>
    <div class="card-body">  
      <div class="form-group row">
        <label for="nome_representante2" class="col-sm-2 col-form-label">Nome:</label>
        <div class="col-sm-10">
          <input type="text" name="nome_representante2" class="form-control" id="nome_representante2" placeholder="Insira seu nome completo" value="{{old('nome_representante2',$convenio->nome_representante2)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="cargo_representante2" class="col-sm-2 col-form-label">Cargo:</label>
        <div class="col-sm-10">
          <input type="text" name="cargo_representante2" class="form-control" id="cargo_representante2" placeholder="Insira seu cargo" value="{{old('cargo_representante2',$convenio->cargo_representante2)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="email_representante2" class="col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-10">
          <input type="email" name="email_representante2" class="form-control" id="email_representante2" placeholder="Insira seu email" value="{{old('email_representante2',$convenio->email_representante2)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="rg_representante2" class="col-sm-2 col-form-label">RG:</label>
        <div class="col-sm-10">
          <input type="text" name="rg_representante2" class="form-control" id="rg_representante2" placeholder="Insira seu RG" value="{{old('rg_representante2',$convenio->rg_representante2)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="cpf_representante2" class="col-sm-2 col-form-label">CPF:</label>
        <div class="col-sm-10">
          <input type="text" name="cpf_representante2" class="cpf form-control" id="cpf_representante2" placeholder="Insira seu CPF (SOMENTE NÚMEROS)" value="{{old('cpf_representante2',$convenio->cpf_representante2)}}">
        </div>
      </div>
    </div>  
</div>
</br>
<div class="card">
  <div class="card-header"><h4>Compatibilidade de Estágio e Atividades</h4></div>
    <div class="card-body">   
     	<div class="row form-group">
    	    <label for="descricao" class="required ">Descreva brevemente as condições de compatibilidade entre as atividades oferecidas para estágio e a natureza dos cursos de nossa Faculdade:</label>
    	    <textarea class="col-sm form-control" name="descricao" id="descricao" rows="3"> {{old('descricao',$convenio->descricao)}}</textarea>
      	</div>
      	<div class="row form-group">
    	    <label for="atividade" class="required ">Atividades previstas para os estagiários:</label>
    	    <textarea class="form-control" name="atividade" id="atividade" rows="3">{{old('atividade',$convenio->atividade)}}</textarea>
      	</div>
    </div>
</div>        
</br>
<div class="card">
  <div class="card-header"><h4>Funcionário para contato</h4></div>
    <div class="card-body">
      <div class="form-group row">
        <label for="nome_contato" class="required col-sm-2 col-form-label">Nome:</label>
        <div class="col-sm-10">
          <input type="text" name="nome_contato" class="form-control" id="nome_contato" placeholder="Insira seu nome completo" value="{{old('nome_contato',$convenio->nome_contato)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="tel_contato" class="required col-sm-2 col-form-label">Telefone:</label>
        <div class="col-sm-10">
          <input type="text" name="tel_contato" class="telefone_com_ddd form-control" id="tel_contato" placeholder="Insira seu telefone" value="{{old('tel_contato',$convenio->tel_contato)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="email_contato" class="required col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-10">
          <input type="email" name="email_contato" class="form-control" id="email_contato" placeholder="Insira seu email" value="{{old('email_contato',$convenio->email_contato)}}">
         </div> 
       </div>
     </div>
</div>      

</br>
<div class="row">
 <div class="col-sm form-group">
 	  <blockquote class="blockquote text-center">
    	<button type="submit" class="btn btn-success">Enviar</button>
	  </blockquote>
  </div>
</div>