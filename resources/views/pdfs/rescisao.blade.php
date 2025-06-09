@extends('pdfs.header')

@section('content')

<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: justify; padding: 0px;"><b>INFORMAÇÃO IMPORTANTE</b>
<br>
Rescisão do Estágio
<br>
Os documentos de rescisão devem estar acompanhados de um relatório pessoal do
aluno(digitado, datado e assinado), relatando sua experiência no período do
estágio.
<br>
<hr>
<b style="text-align: center;">É OBRIGATORIO ANEXAR RELATÓRIO PESSOAL DO ALUNO (DIGITADO E ASSINADO).</b>
</div>

<br>
<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: center; padding: 0px;">
    <b>RESCISÃO DE TERMO DE COMPROMISSO DE ESTÁGIO</b>
</div></div>
<br>

<div style="text-align: justify;">
Comunicamos que em <b>{{ $estagio->rescisao_data }}</b> foi/será rescindido o Termo de Compromisso de Estágio firmado em <b>{{ $estagio->data_inicial }}</b>
entre <b>{{ $estagio->empresa->nome }}</b>, CNPJ <b>{{ $estagio->empresa->cnpj}}</b> e o(a) estagiário(a) <b>{{ $estagio->nome }}</b>,
nº USP <b>{{ $estagio->numero_usp }}</b>, regularmente matriculado no curso de <b>{{ $estagio->curso }}</b> com
interveniência da Universidade de São Paulo.
<br>
<br>
Informamos que o referido estágio foi rescindido na data supracitada pelo seguinte motivo: <b>{{ $estagio->rescisao_motivo }}</b>
<br>
<br>
E por estarem de inteiro e comum acordo assinam-na em três vias de igual teor, cabendo a 1ª à Unidade Concedente, a 2ª ao Estagiário e a 3a ª Instituição de
Ensino.
<br>
<br>
</div>

<br>
<br>
<div style="text-align: center">São Paulo, {{ Carbon\Carbon::now()->format('d/m/Y') }}</div>
<br>
<br>

________________________________________<br>
<b>{{ $estagio->empresa->nome_do_representante }}<br>
Representante da {{ $estagio->empresa->nome }}</b>
<br>
<br>
________________________________________<br>
<b>{{ $estagio->nome }}</b>
<br>
<br>
________________________________________<br>
<b>{{ \App\Models\Parecerista::nomePresidente() }}<br>
Presidente da Comissão de Graduação - {{ $settings->sigla_unidade }}</b>


<p style="page-break-after: never;"></p>

@endsection('content')

@section('footer')
<div style="text-align: initial; font-weight: bold;">
É OBRIGATORIO ANEXAR RELATÓRIO PESSOAL DO ALUNO(DIGITADO E ASSINADO).
</div>
@endsection
