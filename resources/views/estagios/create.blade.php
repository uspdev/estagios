@extends('laravel-usp-theme::master')

@section('content')

<form method="POST" action="/estagios">
@csrf

<b>ESTÁGIO</b>
<br>
O PERÍODO MÁXIMO DO ESTÁGIO INICIAL DEVE SER DE 12 MESES, PRORROGÁVEL ATRAVÉS DE TERMO
ADITIVO POR ATÉ 12 MESES.
<br>

<b>Valor da Bolsa: *</b>
<div class="form-group">
    <label for="numero_usp">R$ </label>
    <input type="text" class="form-control" id="valorbolsa" name="valorbolsa">
</div>

<br>

<div class="form-group">
    <label for="especifique"><b>Especifique: *</b></label>
    <select name="especifique" class="form-control" id="especifique">
        <option value="" selected="selected">- Selecione -</option>
        <option value="Mensal">mensais</option>
        <option value="Por Hora">por hora</option>
    </select> 
</div>

<div class="form-group">
<label for="duracao"><b>Descreva a duração [(ex.: 12 meses, 6 meses e 19 dias, 27 dias, etc) Em casos 
excepcionais inferiores a 6 meses, a empresa deverá incluir justificativa circunstanciada 
que será avaliada pelo Supervisor Geral de Estágios.</b></label>
    <input type="text" class="form-control" id="duracao" name="duracao">
</div>

<div class="form-group">
<label for="justificativa"><b>Justificativa:</b></label>
    <input type="textarea" cols="60" rows="5" class="form-control" id="justificativa" name="justificativa">
</div>

<hr>

<b>Início do Estágio: *</b>
<div class="form-group">
    <select name="diaini" class="form-control" id="diaini">
        <option value="" selected="selected">Dia</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
    </select> 
</div>

<div class="form-group">
    <select name="mesini" class="form-control" id="mesini">
        <option value="" selected="selected">Mês</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
    </select> 
</div>

<div class="form-group">
    <select name="anoini" class="form-control" id="anoini">
        <option value="" selected="selected">Ano</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option>
    </select> 
</div>

<b>Término do Estágio: *</b>
<div class="form-group">
    <select name="diafin" class="form-control" id="diafin">
        <option value="" selected="selected">Dia</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
    </select> 
</div>

<div class="form-group">
    <select name="mesfin" class="form-control" id="mesfin">
        <option value="" selected="selected">Mês</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
    </select> 
</div>

<div class="form-group">
    <select name="anofin" class="form-control" id="anofin">
        <option value="" selected="selected">Ano</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option>
    </select> 
</div>

<hr>

<p>CARGA HORÁRIA SEMANA (máximo 30 horas)</p>
<div class="form-group">
<label for="cargahoras"><b>Horas: </b></label>
    <input type="text" class="form-control" id="cargahoras" name="cargahoras">
</div>

<div class="form-group">
<label for="cargaminutos"><b>Minutos: </b></label>
    <input type="text" class="form-control" id="cargaminutos" name="cargaminutos">
</div>

<div class="form-group">
<label for="horario"><b>Horário do Estágio (início e término, formato 00:00). 
Caso os horários sejam em períodos diferentes especificar: *</b></label>
    <input type="text" class="form-control" id="horario" name="horario">
</div>

<hr>

<div class="form-group">
<label for="auxtrans"><b>Auxílio transporte: *</b></label>
    <input type="text" class="form-control" id="auxtrans" name="auxtrans">
</div>

<div class="form-group">
    <label for="especifiquevt"><b>Especifique: *</b></label>
    <select name="especifiquevt" class="form-control" id="especifiquevt">
        <option value="" selected="selected">- Selecione -</option>
        <option value="Mensal">mensais</option>
        <option value="Diário">diários</option>
    </select> 
</div>

<hr>

<div class="form-group">
<label for="atividades"><b>Descrição detalhada das atividades a serem desenvolvidas pelo 
estagiário para que o parecerista analise e constate a relação destas com a formação 
acadêmica do aluno.: *</b></label>
    <input type="textarea" cols="60" rows="5" class="form-control" id="atividades" name="atividades">
</div>

<hr>

<div class="form-group">
    <label for="numero_usp">Número USP: </label>
    <input type="text" class="form-control" id="numero_usp" name="numero_usp">
<label for="seguradora"><b>Nome da seguradora: *</b></label>
    <input type="text" class="form-control" id="seguradora" name="seguradora">
</div>

<div class="form-group">
    <label for="nome">Nome: </label>
    <input type="text" class="form-control" id="nome" name="nome">
<label for="numseguro"><b>Número da apólice de seguro: *</b></label>
    <input type="text" class="form-control" id="numseguro" name="numseguro">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
</form>
@endsection('content')