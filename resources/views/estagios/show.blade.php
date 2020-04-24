@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<h5> Dados sobre o estágio:</h5><br>

<b>Valor da Bolsa:</b> {{$estagio->valorbolsa}}<br>
<b>Tipo da Bolsa:</b> {{$estagio->tipobolsa}}<br>
<b>Justificativa:</b> {{$estagio->justificativa}}<br><hr>
<b>Data de Início:</b> {{$estagio->dataini}}<br>
<b>Data de Término:</b> {{$estagio->datafin}}<br><hr>
<b>Carga Horária:</b> {{$estagio->cargahoras}} horas e {{$estagio->cargaminutos}} minutos.<br>
<b>Horário do Estágio:</b> {{$estagio->horario}}<br><hr>
<b>Valor do Auxílio Transporte:</b> {{$estagio->auxtrans}}<br>
<b>Tipo de Auxílio:</b> {{$estagio->especifiquevt}}<br><hr>
<b>Atividades a Serem Desenvolvidas:</b> {{$estagio->atividades}}<br><hr>
<b>Seguradora:</b> {{$estagio->seguradora}}<br>
<b>Número da Apólice:</b> {{$estagio->numseguro}}<br>


@endsection('content')