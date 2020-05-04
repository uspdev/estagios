    <div class="card">
        <div class="card-header">Cadastro de Empresa</div>
        <div class="card-body">
            <div class="row">
                <div class="col-8 form-group">
                    <label for="nome_da_empresa" class="required">Nome da Empresa:</label>
                    <input type="text" maxlength="128" class="form-control" name="nome_da_empresa" value="{{old('nome_da_empresa', $empresa->nome_da_empresa)}}">
                </div>     
                <div class="col-4 form-group">
                    <label for="cnpj_da_empresa">CNPJ:</label>
                    <input type="text" maxlength="18" class="form-control cnpj" name="cnpj_da_empresa" value="{{old('cnpj_da_empresa', $empresa->cnpj_da_empresa)}}">
                </div>
            </div>
            <div class="row">
                <div class="col-4 form-group">
                    <label for="area_de_atuacao_da_empresa">Área de Atuação da Empresa:</label>
                    <input type="text" maxlength="128" class="form-control" name="area_de_atuacao_da_empresa" value="{{old('area_de_atuacao_da_empresa', $empresa->area_de_atuacao_da_empresa)}}">
                </div>
                <div class="col-8 form-group">
                    <label for="endereco_da_empresa">Endereço da Empresa:</label>
                    <input type="text" maxlength="128" class="form-control" name="endereco_da_empresa" value="{{old('endereco_da_empresa', $empresa->endereco_da_empresa)}}">
                </div>
            </div>
            <div class="row">
                <div class="col-sm form-group">
                    <label for="nome_de_contato_da_empresa">Nome de Contato da Empresa:</label>
                    <input type="text" maxlength="128" class="form-control" name="nome_de_contato_da_empresa" value="{{old('nome_de_contato_da_empresa', $empresa->nome_de_contato_da_empresa)}}">
                </div>    
                <div class="col-sm form-group">
                    <label for="email_de_contato_da_empresa">E-mail de Contato da Empresa:</label>
                    <input type="email" maxlength="128" class="form-control" name="email_de_contato_da_empresa" value="{{old('email_de_contato_da_empresa', $empresa->email_de_contato_da_empresa)}}">
                </div>
                <div class="col-sm form-group">
                    <label for="telefone_de_contato_da_empresa">Telefone de Contato da Empresa:</label>
                    <input type="text" maxlength="128" class="form-control telefone-com-ddd" name="telefone_de_contato_da_empresa" value="{{old('telefone_de_contato_da_empresa', $empresa->telefone_de_contato_da_empresa)}}">
                </div>    
            </div>
            <div class="row">
                <div class="col-8 form-group">
                    <label for="nome_do_representante_da_empresa">Nome do Representante da Empresa que irá assinar o Termo de Compromisso:</label>
                    <input type="text" maxlength="128" class="form-control" name="nome_do_representante_da_empresa" value="{{old('nome_do_representante_da_empresa', $empresa->nome_do_representante_da_empresa)}}">
                </div>    
                <div class="col-4 form-group">
                    <label for="cargo_do_representante_da_empresa">Cargo do Representante da Empresa:</label>
                    <input type="text" maxlength="128" class="form-control" name="cargo_do_representante_da_empresa" value="{{old('cargo_do_representante_da_empresa', $empresa->cargo_do_representante_da_empresa)}}">
                </div>
            </div>
            <div class="row">
                <div class="col-8 form-group">
                    <label for="nome_do_supervisor_do_estagio">Nome do Supervisor Interno de Estágio que assinará o Plano de Estágio:</label>
                    <input type="text" maxlength="128" class="form-control" name="nome_do_supervisor_do_estagio" value="{{old('nome_do_supervisor_do_estagio', $empresa->nome_do_supervisor_do_estagio)}}">
                </div>
                <div class="col-4 form-group">
                    <label for="cargo_do_supervisor_do_estagio">Cargo do Supervisor Interno do Estágio:</label>
                    <input type="text" maxlength="128" class="form-control" name="cargo_do_supervisor_do_estagio" value="{{old('cargo_do_supervisor_do_estagio', $empresa->cargo_do_supervisor_do_estagio)}}">
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="telefone_do_supervisor_do_estagio">Telefone do Supervisor de Estágios:</label>
                    <input type="text" maxlength="128" class="form-control telefone-com-ddd" name="telefone_do_supervisor_do_estagio" value="{{old('telefone_do_supervisor_do_estagio', $empresa->telefone_do_supervisor_do_estagio)}}">
                </div>    
                <div class="col-6 form-group">
                    <label for="email_do_supervisor_do_estagio">E-mail do Supervisor de Estágios:</label>
                    <input type="email" maxlength="128" class="form-control" name="email_do_supervisor_do_estagio" value="{{old('email_do_supervisor_do_estagio', $empresa->email_do_supervisor_do_estagio)}}">
                </div>
            </div>
            <div class="row">
                <div class="col-sm form-group">
                    <button type="submit" class="btn btn-success">Enviar</button>    
                </div>
            </div>
        </div>
    </div>