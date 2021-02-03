@extends('pdfs.fflch')


@inject('pessoa','Uspdev\Replicado\Pessoa')
@inject('graduacao','Uspdev\Replicado\Graduacao')

@php
$presidente = App\Models\Parecerista::where('presidente', true)->first();
$empresa = App\Models\Empresa::where('cnpj',$estagio->cnpj)->first();

$empresa->cnpj =  substr($empresa->cnpj, 0, 2) . '.' . substr($empresa->cnpj, 2, 3) . '.' . substr($empresa->cnpj, 5, 3) . '/' . substr($empresa->cnpj, 8, 4) . '-' . substr($empresa->cnpj, 12, 2);

$endereco = Uspdev\Replicado\Pessoa::obterEndereco($estagio->numero_usp);
// Formata endereço
$endereco = [
    $endereco['nomtiplgr'],
    $endereco['epflgr'] . ",",
    $endereco['numlgr'] . " ",
    $endereco['cpllgr'] . " - ",
    $endereco['nombro'] . " - ",
    $endereco['cidloc'] . " - ",
    $endereco['sglest'] . " - ",
    "CEP: " . $endereco['codendptl'],
];

@endphp


@inject('replicado_utils','App\Utils\ReplicadoUtils')

@section('content')
<div style="border: 1px solid #000; text-align: center;">
    <b>ADITIVO DE ALTERAÇÕES NO TERMO DE COMPROMISSO</b>
</div>

<br>
<div style="text-align: justify; text-indent : 1em;"><b>{{ $empresa->nome }}, CNPJ Nº {{ $empresa->cnpj }},
</b> representada por seu(a) <b>{{ $empresa->cargo_do_representante }}, {{ $empresa->nome_do_representante }}</b> 
adiante designada CONCEDENTE e o ESTAGIÁRIO(A) <b>{{ $pessoa::dump($estagio->numero_usp)['nompes'] }}</b>, no USP <b>
{{ $estagio->numero_usp }}</b>, curso <b>{{ $graduacao::curso($estagio->numero_usp, 8)['nomhab'] }}</b> e como INTERVENIENTE 
a Faculdade de Filosofia, Letras e Ciências Humanas da Universidade de São Paulo, representada pela Presidente da Comissão de Graduação 
<b>{{ $pessoa::dump($presidente->numero_usp)['nompes'] }}</b>, firmam o presente TERMO DE ADITAMENTO DE COMPROMISSO DE ESTÁGIO, nos termos da Lei
11.788/08 e da Resolução USP no 5.528/09, conforme as condições a seguir:</div>
<p style="text-align: justify; text-indent : 1em;">1. Alterações realizadas no termo:
<b>
@foreach($estagio->aditivos as $aditivo)
    <p style="text-align: justify; text-indent : 1em;">
    - {{ $aditivo->alteracao }} <br>
    </p>
@endforeach
</b></p>
<div style="text-align: justify; text-indent : 1em;">2. Permanecem inalteradas as demais cláusulas do Termo de Compromisso de
Estágio, inclusive o Plano de Estágios, do qual passa a fazer parte integrante o
presente Termo Aditivo, ficando sem efeito as disposições em contrário.<br>
<p style="text-align: justify; text-indent : 1em;">E por estarem de comum acordo, as partes acima identificadas assinam o
presente Termo Aditivo em 03(três) vias de igual teor, em papel timbrado ou com
carimbo contendo o CNPJ da empresa, para que produza seus jurídicos efeitos.</p><br>
</div>

<div style="page-break-inside: avoid;">

<div style="text-align: center;">São Paulo, {{ Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}</div>

<br><br>

________________________________________<br>
<b>{{ $empresa->nome }}</b>
<br>
<br>
________________________________________<br>
<b>{{ $pessoa::dump($estagio->numero_usp)['nompes'] }}</b>
<br>
<br>
________________________________________<br>
<b>{{ $pessoa::dump($presidente->numero_usp)['nompes'] }}</b><br>
<b>Presidente da Comissão de Graduação da FFLCH</b>
<br><br><br>
E-mail do estagiario: {{ $pessoa::email($estagio->numero_usp) }}<br>
Contato: {{$estagio->nome_de_contato}}, tel.: {{$estagio->telefone_de_contato}}, e-mail: {{$estagio->email_de_contato}}
<br>
</div>

<p style="page-break-after: never;"></p>

@endsection('content')

@section('footer')
<div style="text-align: initial; font-weight: bold;">O PRAZO PARA DEVOLUÇÃO DO DOCUMENTO É DE 15 DIAS ÚTEIS.
AO FINAL DE CADA SEMESTRE O ESTAGIÁRIO DEVE APRESENTAR O RELATÓRIO DE
ESTÁGIO, NOS TERMOS DA LEI 11.788, DA RESOLUÇÃO USP N. 5528.</b>
</div>
@endsection
