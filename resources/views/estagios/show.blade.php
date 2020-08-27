@section('javascripts_head')
  <script src="{{asset('/js/estagios.js')}}"></script>
@endsection('javascript_head')

@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

@inject('pessoa','Uspdev\Replicado\Pessoa')

<div class="card">
    <div class="card-header"><b>Status do Estágio</b></div>
      <div class="card-body">
        @include('estagios.etapas')
      </div>  
    </div>

<br>

<div class="card">
  <div class="card-header"><b>Informações Gerais</b></div>
    <div class="card-body">
        <b>Número USP:</b> {{$estagio->numero_usp}}<br>
        <b>Nome do aluno:</b> {{$pessoa::dump($estagio->numero_usp)['nompes'] }}<br>
        <b>Média ponderada:</b> {{$estagio->mediaponderada}}<br>            
        <b>Valor da bolsa:</b> {{$estagio->valorbolsa}}<br>
        <b>Tipo de bolsa:</b> {{$estagio->tipobolsa}}<br>
        <b>Justificativa:</b> {{$estagio->justificativa}}<br>
        <b>CNPJ da empresa:</b> {{$estagio->cnpj}}<br>
        <b>Atividades a serem desenvolvidas:</b> {{$estagio->atividades}}<br>
        <b>O horário é compatível com o curso?:</b> {{$estagio->horariocompativel}}<br>
        <b>As ativídades são pertinentes ao curso?:</b> {{$estagio->atividadespertinentes}}<br>        
        <b>Desempenho acadêmico:</b> {{$estagio->desempenhoacademico}}<br>
        <b>Comentários adicionais do parecer de mérito:</b> {{$estagio->analise_academica}}<br>
    </div>
</div>

<br>

<div class="card">
  <div class="card-header"><b>Período do Estágio</b></div>
    <div class="card-body">
        <b>Duração do estágio:</b> {{$estagio->duracao}}<br>
        <b>Data de início:</b> {{ $estagio->data_inicial }}<br>
        <b>Data de término:</b> {{ $estagio->data_final }}<br>
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
            <b>Interação com ambiente, colaboradores e dias onde ocorrerá o deslocamento para a empresa:</b> {{$estagio->interacao}}<br>
            <b>Endereço e dias do estágio:</b> {{$estagio->enderecoedias}}<br>
    </div>    
</div>    

<br>

<div class="card">
    <div class="card-header"><b>Informações relatívas a pandemia de COVID-19</b></div>
        <div class="card-body">
            <b>O estágio será realizado em home-office?:</b> {{$estagio->pandemiahomeoffice}}<br>
            <b>Em caso do estágio não ser home-office, quais as medidas sanitárias adotadas pela empresa são:</b> {{$estagio->pandemiamedidas}}<br>
    </div>    
</div>  

@endsection('content')

