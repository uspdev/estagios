<div class="card">
  <div class="card-header"><h4>Representante legal da Empresa que irá assinar o Termo de Convênio</h4></div>
    <div class="card-body">  
      <div class="form-group row">
        <label for="nome_rep" class="required col-sm-2 col-form-label">Nome:</label>
        <div class="col-sm-10">
          <input type="text" name="nome_rep" class="form-control" id="nome_rep" placeholder="Insira seu nome completo" value="{{old('nome_rep',$convenio->nome_rep)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="cargo_rep" class="required col-sm-2 col-form-label">Cargo:</label>
        <div class="col-sm-10">
          <input type="text" name="cargo_rep" class="form-control" id="cargo_rep" placeholder="Insira seu cargo" value="{{old('cargo_rep',$convenio->cargo_rep)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="email_rep" class="required col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-10">
          <input type="email" name="email_rep" class="form-control" id="email_rep" placeholder="Insira seu email" value="{{old('email_rep',$convenio->email_rep)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="rg_rep" class="required col-sm-2 col-form-label">RG:</label>
        <div class="col-sm-10">
          <input type="text" name="rg_rep" class="form-control" id="rg_rep" placeholder="Insira seu RG" value="{{old('rg_rep',$convenio->rg_rep)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="cpf_rep" class="required col-sm-2 col-form-label">CPF:</label>
        <div class="col-sm-10">
          <input type="text" name="cpf_rep" class="cpf form-control" id="cpf_rep" placeholder="Insira seu CPF (SOMENTE NÚMEROS)" value="{{old('cpf_rep',$convenio->cpf_rep)}}">
        </div>
      </div>

  </div>  
</div>
</br>
 <div class="card">
  <div class="card-header"><h4>Preencher caso haja mais Representates legais da Empresa</h4></div>
    <div class="card-body">  
      <div class="form-group row">
        <label for="nome_rep2" class="col-sm-2 col-form-label">Nome:</label>
        <div class="col-sm-10">
          <input type="text" name="nome_rep2" class="form-control" id="nome_rep2" placeholder="Insira seu nome completo" value="{{old('nome_rep2',$convenio->nome_rep2)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="cargo_rep2" class="col-sm-2 col-form-label">Cargo:</label>
        <div class="col-sm-10">
          <input type="text" name="cargo_rep2" class="form-control" id="cargo_rep2" placeholder="Insira seu cargo" value="{{old('cargo_rep2',$convenio->cargo_rep2)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="email_rep2" class="col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-10">
          <input type="email" name="email_rep2" class="form-control" id="email_rep2" placeholder="Insira seu email" value="{{old('email_rep2',$convenio->email_rep2)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="rg_rep2" class="col-sm-2 col-form-label">RG:</label>
        <div class="col-sm-10">
          <input type="text" name="rg_rep2" class="form-control" id="rg_rep2" placeholder="Insira seu RG" value="{{old('rg_rep2',$convenio->rg_rep2)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="cpf_rep2" class="col-sm-2 col-form-label">CPF:</label>
        <div class="col-sm-10">
          <input type="text" name="cpf_rep2" class="cpf form-control" id="cpf_rep2" placeholder="Insira seu CPF (SOMENTE NÚMEROS)" value="{{old('cpf_rep2',$convenio->cpf_rep2)}}">
        </div>
      </div>
    </div>  
</div>
</br>
<div class="card">
  <div class="card-header"><h4>Compatibilidade de Estágio e Atividades</h4></div>
    <div class="card-body">   
     	<div class="row form-group">
    	    <label for="desc" class="required ">Descreva brevemente as condições de compatibilidade entre as atividades oferecidas para estágio e a natureza dos cursos de nossa Faculdade:</label>
    	    <textarea class="col-sm form-control" name="desc" id="desc" rows="3"> {{old('desc',$convenio->desc)}}</textarea>
      	</div>
      	<div class="row form-group">
    	    <label for="ativ" class="required ">Atividades previstas para os estagiários:</label>
    	    <textarea class="form-control" name="ativ" id="ativ" rows="3">{{old('ativ',$convenio->ativ)}}</textarea>
      	</div>
    </div>
</div>        
</br>
<div class="card">
  <div class="card-header"><h4>Funcionário para contato</h4></div>
    <div class="card-body">
      <div class="form-group row">
        <label for="nome_cont" class="required col-sm-2 col-form-label">Nome:</label>
        <div class="col-sm-10">
          <input type="text" name="nome_cont" class="form-control" id="nome_cont" placeholder="Insira seu nome completo" value="{{old('nome_cont',$convenio->nome_cont)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="tel_cont" class="required col-sm-2 col-form-label">Telefone:</label>
        <div class="col-sm-10">
          <input type="text" name="tel_cont" class="telefone_com_ddd form-control" id="tel_cont" placeholder="Insira seu telefone" value="{{old('tel_cont',$convenio->tel_cont)}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="email_cont" class="required col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-10">
          <input type="email" name="email_cont" class="form-control" id="email_cont" placeholder="Insira seu email" value="{{old('email_cont',$convenio->email_cont)}}">
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