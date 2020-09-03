<div class="card">
    <div class="card-header">Cadastro de Empresa</div>
    <div class="card-body">
        <div class="row">
            <div class="col-5 form-group">
                <label for="nome" class="required">Nome da Empresa:</label>
                <input type="text" maxlength="128" class="form-control" name="nome" value="{{old('nome', $empresa->nome)}}">
            </div>     
            <div class="col-4 form-group">
                <label for="razao_social" class="required">Razão Social:</label>
                <input type="text" maxlength="128" class="form-control" name="razao_social" value="{{old('razao_social', $empresa->razao_social)}}">
            </div>
            <div class="col-3 form-group">
                <label for="cnpj" class="required">CNPJ:</label>
                <input type="text" maxlength="18" class="form-control cnpj" name="cnpj" value="{{old('cnpj', $empresa->cnpj)}}">
            </div> 
        </div>
        <div class="row">
            <div class="col-5 form-group">
                <label for="area_de_atuacao" class="required">Área de Atuação da Empresa:</label>
                <input type="text" maxlength="128" class="form-control" name="area_de_atuacao" value="{{old('area_de_atuacao', $empresa->area_de_atuacao)}}">
            </div>
            <div class="col-5 form-group">
                <label for="endereco" class="required">Endereço da Empresa:</label>
                <input type="text" maxlength="128" class="form-control" name="endereco" value="{{old('endereco', $empresa->endereco)}}">
            </div>
            <div class="col-2 form-group">
                <label for="cep" class="required">CEP:</label>
                <input type="text" maxlength="18" class="form-control cep" name="cep" value="{{old('cep', $empresa->cep)}}">
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label for="nome_de_contato" class="required">Nome de Contato da Empresa:</label>
                <input type="text" maxlength="128" class="form-control" name="nome_de_contato" value="{{old('nome_de_contato', $empresa->nome_de_contato)}}">
            </div>    
            <div class="col-4 form-group">
                <label for="telefone_de_contato" class="required">Telefone de Contato da Empresa:</label>
                <input type="text" maxlength="11" id="telefone-com-ddd" placeholder="Insira o telefone com DDD" class="form-control" name="telefone_de_contato" value="{{old('telefone_de_contato', $empresa->telefone_de_contato)}}">
            </div> 
            <div class="col-4 form-group">
                <label for="email_de_contato" class="required">E-mail de Contato da Empresa:</label>
                <input type="email" maxlength="128" id="email_de_contato" class="form-control" name="email_de_contato" value="{{old('email_de_contato', $empresa->email_de_contato)}}">
            </div>   
        </div>
        <div class="row">
            <div class="col-8 form-group">
                <label for="nome_do_supervisor_estagio" class="required">Nome do Supervisor Interno de Estágio que assinará o Plano de Estágio:</label>
                <input type="text" maxlength="128" class="form-control" name="nome_do_supervisor_estagio" value="{{old('nome_do_supervisor_estagio', $empresa->nome_do_supervisor_estagio)}}">
            </div>
            <div class="col-4 form-group">
                <label for="cargo_do_supervisor_estagio" class="required">Cargo do Supervisor Interno do Estágio:</label>
                <input type="text" maxlength="128" class="form-control" name="cargo_do_supervisor_estagio" value="{{old('cargo_do_supervisor_estagio', $empresa->cargo_do_supervisor_estagio)}}">
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                <label for="telefone_do_supervisor_estagio" class="required">Telefone do Supervisor de Estágios:</label>
                <input type="text" maxlength="11" id="telefone-com-ddd" class="form-control" placeholder="Insira o telefone com DDD" name="telefone_do_supervisor_estagio" value="{{old('telefone_do_supervisor_estagio', $empresa->telefone_do_supervisor_estagio)}}">
            </div>    
            <div class="col-6 form-group">
                <label for="email_do_supervisor_estagio" class="required">E-mail do Supervisor de Estágios:</label>
                <input type="email" maxlength="128" class="form-control" name="email_do_supervisor_estagio" value="{{old('email_do_supervisor_estagio', $empresa->email_do_supervisor_estagio)}}">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-4 form-group">
                <label for="nome_do_representante" class="required">Nome do Representante da Empresa que irá assinar o Termo de Compromisso:</label>
                <input type="text" maxlength="128" class="form-control" name="nome_do_representante" value="{{old('nome_do_representante', $empresa->nome_do_representante)}}">
            </div>    
            <div class="col-4 form-group">
                <label for="cargo_do_representante" class="required">Cargo do Representante da Empresa:</label>
                <input type="text" maxlength="128" class="form-control" name="cargo_do_representante" value="{{old('cargo_do_representante', $empresa->cargo_do_representante)}}">
            </div> 
            <div class="col-4 form-group">
                <label for="email" class="required">E-mail do Representante da Empresa:</label>
                <input type="email" maxlength="128" class="form-control" name="email" value="{{old('email', $empresa->email)}}">
            </div> 
        </div>
        <div class="row">
            <div class="col-sm form-group">
                <button type="submit" class="btn btn-success">Enviar</button>    
            </div>
        </div>
    </div>
</div>