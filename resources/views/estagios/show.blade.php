@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

@inject('pessoa','Uspdev\Replicado\Pessoa')

<h5><b>Dados sobre o estágio:</b></h5><br>

<div class="card">
  <div class="card-header"><b>Informações Gerais</b></div>
    <div class="card-body">
        <b>Número USP:</b> {{$estagio->numero_usp}}<br>
        <b>Nome do Aluno:</b> {{$pessoa::dump($estagio->numero_usp)['nompes'] }}<br>
        <b>Valor da bolsa:</b> {{$estagio->valorbolsa}}<br>
        <b>Tipo de bolsa:</b> {{$estagio->tipobolsa}}<br>
        <b>Justificativa:</b> {{$estagio->justificativa}}<br>
        <b>CNPJ da empresa:</b> {{$estagio->cnpj}}<br>
        <b>Atividades a serem desenvolvidas:</b> {{$estagio->atividades}}<br>
    </div>
</div>

<br>

<div class="card">
  <div class="card-header"><b>Período do Estágio</b></div>
    <div class="card-body">
        <b>Duração do estágio:</b> {{$estagio->duracao}}<br>
        <b>Data de início:</b> {{date('d/m/Y', strtotime($estagio->data_inicial))}}<br>
        <b>Data de término:</b> {{date('d/m/Y', strtotime($estagio->data_final))}}<br>
    </div>    
</div>    

<br>

<div class="card">
  <div class="card-header"><b>Carga Horária Semanal (máximo 30 horas)</b></div>
    <div class="card-body">
        <b>Carga horária:</b> {{$estagio->cargahoras}} horas e {{$estagio->cargaminutos}} minutos.<br>
        <b>Horário do estágio:</b> {{$estagio->horario}}<br>
    </div>    
</div>            

<br>

<div class="card">
  <div class="card-header"><b>Auxílio Transporte</b></div>
    <div class="card-body">
        <b>Valor do auxílio transporte:</b> {{$estagio->auxiliotransporte}}<br>
        <b>Tipo de auxílio:</b> {{$estagio->especifiquevt}}<br>
    </div>    
</div>            

<br>

<div class="card">
  <div class="card-header"><b>Informações sobre seguro</b></div>
    <div class="card-body">
        <b>Seguradora:</b> {{$estagio->seguradora}}<br>
        <b>Número da apólice:</b> {{$estagio->numseguro}}<br>
    </div>    
</div>           

<br>

<div class="card">
    <div class="card-header"><b>Informações em caso de estágio domiciliar</b></div>
        <div class="card-body">
            <b>Método de controle de horário:</b> {{$estagio->controlehorario}}<br>
            <b>Método de supervisão interna:</b> {{$estagio->supervisao}}<br>
            <b>Interação com ambiente e colaboradores e dias onde ocorrerá Deslocamento para a empresa:</b> {{$estagio->interacao}}<br>
            <b>Endereço e dias do estágio:</b> {{$estagio->enderecoedias}}<br>
    </div>    
</div>                

@endsection('content')