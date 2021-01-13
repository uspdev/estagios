<div class="card">
    <div class="card-header">Cadastro de Empresa</div>
    <div class="card-body">
        <div class="row">
            <div class="col-8 form-group">
                <label for="nome" class="required">Nome da Empresa:</label>
                <input type="text" maxlength="128" class="form-control" name="nome" value="{{old('nome', $empresa->nome)}}">
            </div>     
            <div class="col-4 form-group">
                <label for="cnpj" class="required">CNPJ:</label>
                <input type="text" maxlength="18" class="form-control cnpj" name="cnpj" value="{{old('cnpj', $empresa->cnpj)}}">
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label for="area_de_atuacao" class="required">Área de Atuação da Empresa:</label>
                <input type="text" maxlength="128" class="form-control" name="area_de_atuacao" value="{{old('area_de_atuacao', $empresa->area_de_atuacao)}}">
            </div> 
            <div class="col-4 form-group">
                <label for="endereco" class="required">Endereço da Empresa:</label>
                <input type="text" maxlength="128" class="form-control" name="endereco" value="{{old('endereco', $empresa->endereco)}}">
            </div>
            <div class="col-4 form-group">
                <label for="cep" class="required">CEP:</label>
                <input type="text" maxlength="18" class="form-control cep" name="cep" value="{{old('cep', $empresa->cep)}}">
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label for="nome_do_representante" class="required">Nome do Representante da Empresa:</label>
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
            <div class="col-4 form-group">
                <label for="password" >Senha:</label>
                <input type="password" maxlength="128" class="form-control" name="password">
            </div>
            <div class="col-4 form-group">
                <label for="password_confirmation">Repetir Senha:</label>
                <input type="password" maxlength="128" class="form-control" name="password_confirmation">
            </div>
        </div>

        <hr>

        <div class="row">
          <div class="col-sm form-group">
            <b>Conceder acesso de administração:</b> 
            <br>
            <select name="conceder_acesso_cnpj">
            <option value="" selected=""> - Selecione  -</option>
                @foreach (App\Models\Empresa::get()->sortBy('nome', SORT_NATURAL|SORT_FLAG_CASE) as $empresa_lista)

                @if (old('conceder_acesso_cnpj') == '' and isset($empresa->conceder_acesso_cnpj))
                    <option value="{{$empresa_lista->cnpj}}" {{ ( $empresa->conceder_acesso_cnpj == $empresa_lista->cnpj) ? 'selected' : ''}}>
                        {{$empresa_lista->cnpj}} - {{$empresa_lista->nome}}
                    </option>
                @else
                    <option value="{{$empresa_lista->cnpj}}" {{ ( old('conceder_acesso_cnpj') == $empresa_lista->cnpj) ? 'selected' : ''}}>
                        {{$empresa_lista->cnpj}} - {{$empresa_lista->nome}}
                    </option>
                @endif
                
                @endforeach
            </select>
          </div>
        </div>



        <div class="row">
            <div class="col-sm form-group">
                <button type="submit" class="btn btn-success">Enviar</button>    
            </div>
        </div>
    </div>
</div>