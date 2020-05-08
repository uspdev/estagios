<br>
<h4><b>Estágio</b></h4>
<br>
O período máximo do estágio inicial deve ser de 12 meses, prorrogável através de termo
aditivo por até 12 meses.
<br><br>

<div class="card">
  <div class="card-header"><b>Informações Gerais</b></div>
  <div class="card-body">

        <div class="row">
                    <div class="col-sm form-group">
                <div class="form-group">
                    <label for="numero_usp" class="required"><b>Número USP: </b></label>
                    <input type="text" class="form-control" id="numero_usp" name="numero_usp" value="{{old('numero_usp',$estagio->numero_usp)}}">
                </div>

                </div>
                <div class="col-sm form-group">

                <div class="form-group">
                    <label for="valorbolsa" class="required"><b>Valor da Bolsa (R$): </b></label>
                    <input type="text" class="form-control" id="valorbolsa" name="valorbolsa" value="{{old('valorbolsa',$estagio->valorbolsa)}}">
                </div>

                </div>
        </div>


        <div class="form-group">
            <label for="tipobolsa" class="required"><b>Especifique o tipo de bolsa: </b></label>
            <select name="tipobolsa" class="form-control" id="tipobolsa" value="{{old('tipobolsa',$estagio->tipobolsa)}}">
                <option value="" selected="selected">- Selecione -</option>
                <option value="Mensal">mensais</option>
                <option value="Por Hora">por hora</option>
            </select> 
        </div>

        <div class="form-group">
        <label for="duracao" class="required"><b>Descreva a duração [(ex.: 12 meses, 6 meses e 19 dias, 27 dias, etc) Em casos 
        excepcionais inferiores a 6 meses, a empresa deverá incluir justificativa circunstanciada 
        que será avaliada pelo Supervisor Geral de Estágios.</b></label>
            <input type="text" class="form-control" id="duracao" name="duracao" value="{{old('duracao',$estagio->duracao)}}">
        </div>

        <div class="form-group">
        <label for="justificativa" class="required"><b>Justificativa:</b></label>
            <input type="textarea" cols="60" rows="5" class="form-control" id="justificativa" name="justificativa" value="{{old('justificativa',$estagio->justificativa)}}">
        </div>

        <div class="form-group">
        <label for="cnpj" class="required"><b>CNPJ da empresa: </b></label>
            <input type="text" class="form-control cnpj" id="cnpj" name="cnpj" placeholder="00.000.000/0000-00" value="{{old('cnpj',$estagio->cnpj)}}">
        </div>

        <div class="form-group">
        <label for="atividades" class="required"><b>Descrição detalhada das atividades a serem desenvolvidas pelo 
        estagiário para que o parecerista analise e constate a relação destas com a formação 
        acadêmica do aluno.: </b></label>
            <input type="textarea" cols="60" rows="5" class="form-control" id="atividades" name="atividades" value="{{old('atividades',$estagio->atividades)}}">
        </div>

</div>
</div>

<hr>

<div class="card">
  <div class="card-header"><b>Período do Estágio</b></div>
  <div class="card-body">

        <div class="row">
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="data_inicial" class="required"><b>Data de início do Estágio: </b></label>
                    <input type="text" class="form-control datepicker" id="data_inicial" name="data_inicial" value="{{old('data_inicial',$estagio->data_inicial)}}">
                </div>
            </div>    
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="data_final" class="required"><b>Data de término do Estágio: </b></label>
                    <input type="text" class="form-control datepicker" id="data_final" name="data_final" value="{{old('data_final',$estagio->data_final)}}">
                </div>
        </div>
        </div>
</div>
</div>
<hr>


<div class="card">
  <div class="card-header"><b>Carga Horária Semanal (máximo 30 horas)</b></div>
  <div class="card-body">

        <div class="row">
            <div class="col-sm form-group">
                
                <div class="form-group">
                <label for="cargahoras" class="required"><b>Horas: </b></label>
                    <input type="text" class="form-control" id="cargahoras" name="cargahoras" value="{{old('cargahoras',$estagio->cargahoras)}}">
                </div>
                </div>
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="cargaminutos" class="required"><b>Minutos: </b></label>
                    <input type="text" class="form-control" id="cargaminutos" name="cargaminutos" value="{{old('cargaminutos',$estagio->cargaminutos)}}">
                </div>
                </div></div>

                <div class="form-group">
                <label for="horario" class="required"><b>Horário do Estágio (início e término, formato 00:00). 
                Caso os horários sejam em períodos diferentes especificar: </b></label>
                    <input type="text" class="form-control horario" placeholder="00:00-00:00" id="horario" name="horario" value="{{old('horario',$estagio->horario)}}">
                </div>

    </div>
</div>
<hr>

<div class="card">
  <div class="card-header"><b>Auxílio Transporte</b></div>
  <div class="card-body">

        <div class="row">
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="auxiliotransporte" class="required"><b>Valor do Auxílio transporte: </b></label>
                    <input type="text" class="form-control" id="auxiliotransporte" name="auxiliotransporte" value="{{old('auxiliotransporte',$estagio->auxiliotransporte)}}"> 
                </div></div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="especifiquevt" class="required"><b>Especifique: </b></label>
                    <select name="especifiquevt" class="form-control" id="especifiquevt">
                    {{old('especifiquevt',$estagio->especifiquevt)}}

                        <option value="" selected="">- Selecione -</option>
                        @foreach ($estagio->especifiquevtOptions() as $option)

                          {{-- 1. Situação em que não houve tentativa de submissão e é uma edição --}}
                          @if (old('especifiquevt') == '' and !isset($estagio->especifiquevt))
                            <option value="{{$option}}" {{ ( $estagio->especifiquevt == $option) ? 'selected' : ''}}>
                                {{$option}}
                            </option>
                          {{-- 2. Situação em que houve tentativa de submissão, o valor de old prevalece --}}
                          @else
                            <option value="{{$option}}" {{ ( old('especifiquevt') == $option) ? 'selected' : ''}}>
                                {{$option}}
                            </option>
                          @endif
                          
                        @endforeach
                    </select> 
                </div></div>
        </div>
</div></div>

<hr>

<div class="card">
  <div class="card-header"><b>Informações sobre seguro</b></div>
  <div class="card-body">

        <div class="row">
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="seguradora" class="required"><b>Nome da seguradora: </b></label>
                    <input type="text" class="form-control" id="seguradora" name="seguradora" value="{{old('seguradora',$estagio->seguradora)}}">
                </div></div>
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="numseguro" class="required"><b>Número da apólice de seguro: </b></label>
                    <input type="text" class="form-control" id="numseguro" name="numseguro" value="{{old('numseguro',$estagio->numseguro)}}">
                </div></div>
                </div>
</div>
</div>
<hr>

<div class="card">
  <div class="card-header"><b>Os campos abaixo só devem ser preenchidos em caso de estágio domiciliar</b></div>
  <div class="card-body">

<br>

<div class="form-group">
<label for="controlehorario">Como se dará o controle diário dos horários de início e encerramento das atividades?: </label>
    <input type="textarea" cols="60" rows="5" class="form-control" id="controlehorario" name="controlehorario" value="{{old('controlehorario',$estagio->controlehorario)}}">
</div>

<div class="form-group">
<label for="supervisao">Como se dará a supervisão interna (por parte da empresa)?: </label>
    <input type="textarea" cols="60" rows="5" class="form-control" id="supervisao" name="supervisao" value="{{old('supervisao',$estagio->supervisao)}}">
</div>

<div class="form-group">
<label for="interacao">Como se dará a interação do estagiário com o ambiente e com os demais colaboradores da 
empresa? Haverá deslocamento para a empresa? Se sim, quais dias?: </label>
    <input type="textarea" cols="60" rows="5" class="form-control" id="interacao" name="interacao" value="{{old('interacao',$estagio->interacao)}}">
</div>

<div class="form-group">
<label for="enderecoedias">Qual o endereço e quais serão os dias de estágio?: </label>
    <input type="textarea" class="form-control" id="enderecoedias" name="enderecoedias" value="{{old('enderecoedias',$estagio->enderecoedias)}}">

</div>
</div>
</div>

<hr>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div></div>