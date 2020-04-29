@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<h5><b>Dados sobre o estágio:</b></h5><br>

<b>Número USP:</b> {{$estagio->numero_usp}}<br>
<b>Valor da bolsa:</b> {{$estagio->valorbolsa}}<br>
<b>Tipo de bolsa:</b> {{$estagio->tipobolsa}}<br>
<b>Justificativa:</b> {{$estagio->justificativa}}<br><hr>
<b>Data de início:</b> {{$estagio->implode('/',array_reverse(explode('-',$request->data_inicial)))}}<br>
<b>Data de término:</b> {{$estagio->implode('/',array_reverse(explode('-',$request->data_final)))}}<br><hr>
<b>Carga horária:</b> {{$estagio->cargahoras}} horas e {{$estagio->cargaminutos}} minutos.<br>
<b>Horário do estágio:</b> {{$estagio->horario}}<br><hr>
<b>Valor do auxílio transporte:</b> {{$estagio->auxiliotransporte}}<br>
<b>Tipo de auxílio:</b> {{$estagio->especifiquevt}}<br><hr>
<b>CNPJ da empresa:</b> {{$estagio->cnpj}}<br>
<b>Atividades a serem desenvolvidas:</b> {{$estagio->atividades}}<br><hr>
<b>Seguradora:</b> {{$estagio->seguradora}}<br>
<b>Número da apólice:</b> {{$estagio->numseguro}}<br><hr>
<h5><b>Informações em caso de estágio domiciliar:</b></h5><br>
<b>Método de controle de horário:</b> {{$estagio->controlehorario}}<br>
<b>Método de supervisão interna:</b> {{$estagio->supervisao}}<br>
<b>Interação com ambiente e colaboradores e dias onde ocorrerá Deslocamento para a empresa:</b> {{$estagio->interacao}}<br>
<b>Endereço e dias do estágio:</b> {{$estagio->enderecoedias}}<br><hr>

@endsection('content')