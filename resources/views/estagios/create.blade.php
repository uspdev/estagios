@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<form method="POST" action="/estagios">
@csrf

<b>ESTÁGIO</b>
<br>
O PERÍODO MÁXIMO DO ESTÁGIO INICIAL DEVE SER DE 12 MESES, PRORROGÁVEL ATRAVÉS DE TERMO
ADITIVO POR ATÉ 12 MESES.
<br>

<b>Valor da Bolsa: *</b>
<div class="form-group">
    <label for="valorbolsa">R$ </label>
    <input type="text" class="form-control" id="valorbolsa" name="valorbolsa" value="{{old('valorbolsa')}}">
</div>

<br>

<div class="form-group">
    <label for="tipobolsa"><b>Especifique: *</b></label>
    <select name="tipobolsa" class="form-control" id="tipobolsa" value="{{old('tipobolsa')}}">
        <option value="" selected="selected">- Selecione -</option>
        <option value="Mensal">mensais</option>
        <option value="Por Hora">por hora</option>
    </select> 
</div>

<div class="form-group">
<label for="duracao"><b>Descreva a duração [(ex.: 12 meses, 6 meses e 19 dias, 27 dias, etc) Em casos 
excepcionais inferiores a 6 meses, a empresa deverá incluir justificativa circunstanciada 
que será avaliada pelo Supervisor Geral de Estágios.</b></label>
    <input type="text" class="form-control" id="duracao" name="duracao" value="{{old('duracao')}}">
</div>

<div class="form-group">
<label for="justificativa"><b>Justificativa:</b></label>
    <input type="textarea" cols="60" rows="5" class="form-control" id="justificativa" name="justificativa" value="{{old('justificativa')}}">
</div>

<hr>

<div class="form-group">
<label for="dataini"><b>Data de início do Estágio: *</b></label>
    <input type="text" class="form-control" id="dataini" name="dataini" value="{{old('dataini')}}">
</div>

<div class="form-group">
<label for="datafin"><b>Data de término do Estágio: *</b></label>
    <input type="text" class="form-control" id="datafin" name="datafin" value="{{old('datafin')}}">
</div>


<hr>

<p>CARGA HORÁRIA SEMANA (máximo 30 horas)</p>
<div class="form-group">
<label for="cargahoras"><b>Horas: </b></label>
    <input type="text" class="form-control" id="cargahoras" name="cargahoras" value="{{old('cargahoras')}}">
</div>

<div class="form-group">
<label for="cargaminutos"><b>Minutos: </b></label>
    <input type="text" class="form-control" id="cargaminutos" name="cargaminutos" value="{{old('cargaminutos')}}">
</div>

<div class="form-group">
<label for="horario"><b>Horário do Estágio (início e término, formato 00:00). 
Caso os horários sejam em períodos diferentes especificar: *</b></label>
    <input type="text" class="form-control" id="horario" name="horario" value="{{old('horario')}}">
</div>

<hr>

<div class="form-group">
<label for="auxtrans"><b>Auxílio transporte: *</b></label>
    <input type="text" class="form-control" id="auxtrans" name="auxtrans" value="{{old('auxtrans')}}"> 
</div>

<div class="form-group">
    <label for="especifiquevt"><b>Especifique: *</b></label>
    <select name="especifiquevt" class="form-control" id="especifiquevt" value="{{old('especifiquevt')}}">
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
    <input type="textarea" cols="60" rows="5" class="form-control" id="atividades" name="atividades" value="{{old('atividades')}}">
</div>

<hr>

<div class="form-group">
<label for="seguradora"><b>Nome da seguradora: *</b></label>
    <input type="text" class="form-control" id="seguradora" name="seguradora" value="{{old('seguradora')}}">
</div>

<div class="form-group">
<label for="numseguro"><b>Número da apólice de seguro: *</b></label>
    <input type="text" class="form-control" id="numseguro" name="numseguro" value="{{old('numseguro')}}">
</div>

<hr>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
</form>
@endsection('content')