@extends('pdfs.header')

@section('content')
<div style="border: 1px solid #000; text-align: center;">
    <b>ADITIVO DE ALTERAÇÕES NO TERMO DE COMPROMISSO</b>
</div>

<br>
<div style="text-align: justify; text-indent : 1em;"><b>{{ $estagio->empresa->nome }}, CNPJ Nº {{ $estagio->empresa->cnpj }},
</b> representada por seu(a) <b>@if($estagio->cargo_do_representante_opcional) {{ $estagio->cargo_do_representante_opcional }} @else {{ $estagio->empresa->cargo_do_representante }} @endif,
    @if($estagio->nome_do_representante_opcional) {{ $estagio->nome_do_representante_opcional }} @else {{ $estagio->empresa->nome_do_representante }} @endif</b>
adiante designada CONCEDENTE e o ESTAGIÁRIO(A) <b>{{ $estagio->nome }}</b>, no USP <b>
{{ $estagio->numero_usp }}</b>, curso <b>{{ $estagio->curso }}</b> e como INTERVENIENTE
o(a) {{ $settings->unidade }}, representado(a) pelo(a) Presidente da Comissão de Graduação
<b>{{ \App\Models\Parecerista::nomePresidente() }}</b>, firmam o presente TERMO DE ADITAMENTO DE COMPROMISSO DE ESTÁGIO, nos termos da Lei
11.788/08 e da Resolução USP no 5.528/09, conforme as condições a seguir:</div>
<!--<p style="text-align: justify; text-indent : 1em;">1. Alterações realizadas no termo:
<b>-->
@if($aditivopendente != null)
    @foreach($estagio->aditivos->where('aprovado_graduacao','=',0)->where('comentario_graduacao','=',null) as $aditivo)
        <p style="text-align: justify; text-indent : 1em;">1. O seguinte aditivo foi requisitado:
        <b>
        <p style="text-align: justify; text-indent : 1em;">
        - {{ $aditivo->alteracao }} <br>
        </p>
    @endforeach
@else
    <p style="text-align: justify; text-indent : 1em;">1. Aditivos realizados no termo:
    <b>
    @foreach($estagio->aditivos->where('aprovado_graduacao','=',1) as $aditivo)
        @if($loop->last)
        <p style="text-align: justify; text-indent : 1em;">
        - {{ $aditivo->alteracao }} <br>
        </p>
        @endif
    @endforeach
@endif

</b></p>
<div style="text-align: justify; text-indent : 1em;">2. Permanecem inalteradas as demais cláusulas do Termo de Compromisso de
Estágio, inclusive o Plano de Estágios, do qual passa a fazer parte integrante o
presente Termo Aditivo, ficando sem efeito as disposições em contrário.<br>
<p style="text-align: justify; text-indent : 1em;">E por estarem de comum acordo, as partes acima identificadas assinam o
presente Termo Aditivo em 03(três) vias de igual teor, em papel timbrado ou com
carimbo contendo o CNPJ da empresa, para que produza seus jurídicos efeitos.</p><br>
</div>

<div style="page-break-inside: avoid;">

<div style="text-align: center;">São Paulo, {{ Carbon\Carbon::now()->format('d/m/Y') }}</div>

<br><br>

________________________________________<br>
<b>{{ $estagio->empresa->nome }}</b>
<br>
<br>
________________________________________<br>
<b>{{ $estagio->nome }}</b>
<br>
<br>
________________________________________<br>
<b>{{ \App\Models\Parecerista::nomePresidente() }}</b><br>
<b>Presidente da Comissão de Graduação - {{ $settings->sigla_unidade }}</b>
<br><br><br>
E-mail do estagiario: {{ $estagio->email }}<br>
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
