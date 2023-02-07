@extends('pdfs.fflch')

@section('content')

<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: center; padding: 0px;">
    <b>ADITIVO DE RENOVAÇÃO DO TERMO DE COMPROMISSO</b>
</div>
<hr>
<br><br><br>
<div style="text-align: justify;">
    <p>INFORMAÇÃO IMPORTANTE</p>
    <br><br>
    <p>Renovação do Estágio</p>
    <p>Os documentos para assinatura devem ser entregues com pelo menos 10 dias úteis antes do término do período
        anterior de estágio.</p>
    <p>É obrigatória a entrega de um relatório pessoal (digitado, datado e assinado) na renovação e no término do
        estágio, relatando sua experiência no período do estágio.</p>
    <br><br>
    <p>Ciência d{{ $estagio->artigo_definido }}
    alun{{ $estagio->artigo_definido }}
    {{ $estagio->nome }}:</p>
    <br><br><br><br>
    <p>________________________________________<br>
        <b>{{ $estagio->nome }}</b><br>
        Número USP: <b>{{ $estagio->numero_usp }}</b></p>
</div>

<p style="page-break-after: always;"></p>

<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: center; padding: 0px;">
    <b>ADITIVO DE RENOVAÇÃO DO TERMO DE COMPROMISSO</b>
</div>

<hr>
<br><br>

<div style="text-align: justify;">
    <p style="text-indent: 1em;"><b>{{ $estagio->empresa->nome }}, CNPJ {{ $estagio->empresa->cnpj }}</b>,
        representada por seu(a) <b>@if($estagio->cargo_do_representante_opcional) {{ $estagio->cargo_do_representante_opcional }} @else {{ $estagio->empresa->cargo_do_representante }} @endif
        , @if($estagio->nome_do_representante_opcional) {{ $estagio->nome_do_representante_opcional }} @else {{ $estagio->empresa->nome_do_representante }} @endif</b> adiante designada
        CONCEDENTE e o ESTAGIÁRIO(A) <b>{{ $estagio->nome }}</b>, no USP <b>{{ $estagio->numero_usp }}</b>,
        curso {{ $estagio->curso }} e como
        INTERVENIENTE a Faculdade de Filosofia, Letras e Ciências Humanas da Universidade de São Paulo, representada
        pela Presidente da Comissão de Graduação <b> {{ \App\Models\Parecerista::nomePresidente() }} </b>, firmam o presente TERMO DE
        ADITAMENTO DE COMPROMISSO DE ESTÁGIO, nos termos da Lei 11.788/08 e da Resolução USP no 5.528/09, conforme as
        condições a seguir:
    </p>

    <p>1. Alteração da data de vigência do estágio: <b> PRORROGAÇÃO de {{$estagio->data_inicial}} a
            {{$estagio->data_final}}. </b></p>

    @if(is_null($estagio->alteracoesadcionais))

        <p>2. Não foi realizada nenhuma alteração adcional neste estágio para além da prorrogação de datas. </b></p>

    @else

        <p>2. Para além da prorrogação de datas, foram realizadas pela empresa as seguintes
        alterações adcionais: <b>{{$estagio->alteracoesadcionais}}. </b></p>

    @endif

    <p> 3. Permanecem inalteradas as demais cláusulas do Termo de Compromisso de Estágio, do qual passa a fazer parte
        integrante o presente Termo Aditivo, ficando sem efeito as disposições em contrário.
    </p>

    <p style="text-indent: 1em;">E por estarem de comum acordo, as partes acima identificadas assinam o presente Termo
        Aditivo em 03(três) vias de igual teor, em papel timbrado ou com carimbo contendo o CNPJ da empresa, para que
        produza seus jurídicos efeitos.
    </p>
</div>

<div style="page-break-inside: avoid;">

<div style="text-align: center;">São Paulo, {{ Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}</div>

<br><br>

<div>
    <p>________________________________________<br>
        <b> {{ $estagio->empresa->nome }}</b></p>
    <p>________________________________________<br>
        <b> {{ $estagio->nome }} </b></p>
    <p>________________________________________<br>
        <b>{{ \App\Models\Parecerista::nomePresidente() }}</b><br>
        <b>Presidente da Comissão de Graduação da FFLCH</b></p>
</div>

<br><br>

<div>
    <p><b>Contato:</b> {{ $estagio->nome_de_contato }}, Telefone: {{ $estagio->telefone_de_contato }} <br>
    <b>E-mail da empresa:</b> @if($estagio->email_do_representante_opcional) {{ $estagio->email_do_representante_opcional }} @else {{ $estagio->empresa->email }} @endif
    </p>
</div>

</div>

<p style="page-break-after: always;"></p>

<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: center; padding: 0px;">
    <b>ADITIVO DE RENOVAÇÃO DO TERMO DE COMPROMISSO</b>
</div>

<hr>

<div
    style="border-width: 1px; border-style: solid; border-color: #000; text-align: center; padding: 0px; font-weight: bold">
    PLANO DE ESTÁGIO
</div>

<br>

<div style="text-align: justify">
    Nome d{{ $estagio->artigo_definido }} Estagiári{{ $estagio->artigo_definido }}: <b>{{ $estagio->nome }}</b><br>
    Nº USP: <b>{{ $estagio->numero_usp }}</b><br>
    Telefone: 
        @if(isset($fones))
            <b>{{ $fones }}</b><br>
        @else 
            <b>Não possui telefone cadastrado.</b><br>
        @endif    
    Curso: <b>{{ $estagio->curso }}</b><br>
    Período: <b>{{ $estagio->periodo }}</b><br>
    Semestre: <b>{{ $estagio->semestre_atual }}º</b><br>
    E-mail: <b>{{ $estagio->email }}</b><br>
    Nome da Empresa: <b>{{ $estagio->empresa->nome }}</b><br>
    Área de atuação da Empresa: <b>{{ $estagio->empresa->area_de_atuacao }}</b><br>
    Nome do supervisor(a) interno(a) do Estágio na Empresa: <b>{{ $estagio->nome_do_supervisor_estagio }}</b><br>
    Telefone: <b>{{ $estagio->telefone_do_supervisor_estagio }}</b> , E-mail: <b>{{ $estagio->email_do_supervisor_estagio }}</b><br>
    Nome do Representante da Empresa: <b>@if($estagio->nome_do_representante_opcional) {{ $estagio->nome_do_representante_opcional }} @else {{ $estagio->empresa->nome_do_representante }} @endif </b><br>
    Cargo do Representante da Empresa: <b>@if($estagio->cargo_do_representante_opcional) {{ $estagio->cargo_do_representante_opcional }} @else {{ $estagio->empresa->cargo_do_representante }} @endif </b><br>
    E-mail do Representante da Empresa: <b>@if($estagio->email_do_representante_opcional) {{ $estagio->email_do_representante_opcional }} @else {{ $estagio->empresa->email }} @endif </b><br>
    Data de início do estágio: <b>{{$estagio->data_inicial}}</b><br>
    Data do término do estágio: <b>{{$estagio->data_final}}</b><br>
    Horário do Estágio: <b>{{ $estagio->horario }}</b> Carga horária semanal: <b>{{ $estagio->cargahoras }}
    h{{ $estagio->cargaminutos }} semanais</b><br>
    Duração em meses (em casos excepcionais inferiores a 6 meses, a empresa deverá incluir justificativa circunstanciada
    que será avaliada pelo Supervisor Geral de Estágios): <b>{{ $estagio->duracao }}</b><br>
    Justificativa: <b><i>{{ $estagio->justificativa }}</i></b><br>{{ $estagio->artigo_definido }}
    Valor da Bolsa: R$ <b>{{ $estagio->valorbolsa }} {{ $estagio->tipobolsa }}</b><br>
    Valor do auxílio transporte: R$ <b>{{ $estagio->auxiliotransporte }} {{ $estagio->especifiquevt }}</b><br>
    Descrição detalhada das atividades a serem desenvolvidas pelo estagiário, com a finalidade de permitir a avaliação
    da Comissão de Estágios: <b><i>{{ $estagio->atividades }}</i></b><br>
    <b>NO CASO DE ESTÁGIO DOMICILIAR</b><br>
    Como se dará o controle diário dos horários de início e encerramento das atividades? <b>{{ $estagio->controlehorario }}</b><br>
    Como se dará a supervisão interna (por parte da empresa) do estagiário? <b>{{ $estagio->supervisao}}</b><br>
    Como se dará a interação do estagiário com o ambiente e com os demais colaboradores da empresa? Haverá
    deslocamento para a empresa? Se sim, quais dias? <b>{{ $estagio->interacao }}</b><br>
    Qual o endereço e em quais dias será realizado o estágio?<b>{{$estagio->enderecoedias}}</b><br>
    <b>INFORMAÇÕES RELATIVAS A ESTÁGIO NO PERÍODO DE PANDEMIA</b><br>
    O estágio será realizado em home-office?:</b> <b>{{$estagio->pandemiahomeoffice}}</b><br>
    Em caso do estágio não ser home-office, quais as medidas sanitárias adotadas pela empresa são:</b> <b>{{$estagio->pandemiamedidas}}</b><br>
</div>

<br>
<div style="page-break-inside: avoid;">

<div style="text-align: center;">São Paulo, {{ Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}</div>

<br><br>

<div style="font-style: italic; font-weight: bold;">
    _______________________________________________<br>
    @if($estagio->nome_do_representante_opcional) {{ $estagio->nome_do_representante_opcional }} @else {{ $estagio->empresa->nome_do_representante }} @endif<br>
    Representante da {{ $estagio->empresa->nome }}<br><br>

    _______________________________________________<br>
    <b>{{ $estagio->nome }}</b><br><br>
    _______________________________________________<br>
    <b>{{ \App\Models\Parecerista::nomePresidente() }}</b><br>
    <b>Presidente da Comissão de Graduação da FFLCH/USP</b><br>
</div>
<div>

<p style="page-break-after: never;"></p>

@endsection('content')

@section('footer')
<div style="text-align: initial; font-weight: bold;">
    OS DOCUMENTOS (TERMO E PLANO) DEVEM SER ENTREGUES PARA ANÁLISE 10 DIAS ÚTEIS ANTES DO INÍCIO DO ESTÁGIO.<br>
    AO FINAL DE CADA SEMESTRE DE REALIZAÇÃO DO ESTÁGIO DEVERÁ SER ENTREGUE UM RELATÓRIO PESSOAL, NOS TERMOS DA LEI
    11.788, DA RESOLUÇÃO USP N. 5528.
</div>
@endsection
