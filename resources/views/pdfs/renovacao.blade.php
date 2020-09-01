@extends('pdfs.fflch')


@inject('pessoa','Uspdev\Replicado\Pessoa')
@inject('graduacao','Uspdev\Replicado\Graduacao')

@inject('replicado_utils','App\Utils\ReplicadoUtils')

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
    <p>Ciência d{{ $pessoa::dump($estagio->numero_usp)['sexpes'] === "F" ? "a" : "o" }} 
    alun{{ $pessoa::dump($estagio->numero_usp)['sexpes'] === "F" ? "a" : "o" }} 
    {{ $pessoa::dump($estagio->numero_usp)['nompes'] }}:</p>
    <br><br><br><br>
    <p>________________________________________<br>
        <b>{{ $pessoa::dump($estagio->numero_usp)['nompes'] }}</b><br>
        Número USP: <b>{{ $estagio->numero_usp }}</b></p>
</div>

<p style="page-break-after: always;"></p>

<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: center; padding: 0px;">
    <b>ADITIVO DE RENOVAÇÃO DO TERMO DE COMPROMISSO</b>
</div>

<hr>
<br><br>

<div style="text-align: justify;">
    <p style="text-indent : 6em;"><b>{{ $empresa->nome }}, CNPJ {{ $empresa->cnpj }}</b>,
        representada por seu(a) <b>{{ $empresa->cargo_do_representante }}, {{ $empresa->nome_do_representante }}</b> adiante designada
        CONCEDENTE e o ESTAGIÁRIO(A) <b>{{ $pessoa::dump($estagio->numero_usp)['nompes'] }}</b>, no USP <b>{{ $estagio->numero_usp }}</b>, 
        curso {{ $graduacao::curso($estagio->numero_usp, 8)['nomcur'] }} e como
        INTERVENIENTE a Faculdade de Filosofia, Letras e Ciências Humanas da Universidade de São Paulo, representada
        pela Presidente da Comissão de Graduação <b> {{ $pessoa::dump($presidente->numero_usp)['nompes'] }} </b>, firmam o presente TERMO DE
        ADITAMENTO DE COMPROMISSO DE ESTÁGIO, nos termos da Lei 11.788/08 e da Resolução USP no 5.528/09, conforme as
        condições a seguir:
    </p>

    <p>1. Alterações a serem feitas: <b> PRORROGAÇÃO de {{ \Carbon\Carbon::parse($estagio->dataini)->format('d/m/Y')}} a
            {{ \Carbon\Carbon::parse($estagio->datafin)->format('d/m/Y')}}. </b></p>

    <p>2. Permanecem inalteradas as demais cláusulas do Termo de Compromisso de Estágio, do qual passa a fazer parte
        integrante o presente Termo Aditivo, ficando sem efeito as disposições em contrário.
    </p>

    <p style="text-indent : 3em;">E por estarem de comum acordo, as partes acima identificadas assinam o presente Termo
        Aditivo em 03(três) vias de igual teor, em papel timbrado ou com carimbo contendo o CNPJ da empresa, para que
        produza seus jurídicos efeitos.
    </p>
</div>

<div style="text-align: center">São Paulo, {{ Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}</div>

<br><br><br>

<div>
    <p>________________________________________<br>
        <b> {{ $empresa->nome }}</b></p>
    <p>________________________________________<br>
        <b> {{ $pessoa::dump($estagio->numero_usp)['nompes'] }} </b></p>
    <p>________________________________________<br>
        <b>{{ $pessoa::dump($presidente->numero_usp)['nompes'] }}</b><br>
        <b>Presidente da Comissão de Graduação da FFLCH</b></p>
</div>

<br><br><br>

<div>
    <p>Contato: Gabriela Castro, tel.: 1130032433 <br>
        e-mail: gabriela.castro@ciee.ong.br</p>
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
    Nome d{{ $pessoa::dump($estagio->numero_usp)['sexpes'] === "F" ? "a" : "o" }} Estagiári{{ $pessoa::dump($estagio->numero_usp)['sexpes'] === "F" ? "a" : "o" }}: <b>{{ $pessoa::dump($estagio->numero_usp)['nompes'] }}</b><br>
    Nº USP: <b>{{ $estagio->numero_usp }}</b><br>
    Curso: <b>{{ $graduacao::curso($estagio->numero_usp, 8)['nomhab'] }}</b><br>
    E-mail: <b>{{ $pessoa::email($estagio->numero_usp) }}</b><br>
    Nome da Empresa: <b>{{ $empresa->nome }}</b><br>
    Área de atuação da Empresa: <b>{{ $empresa->area_de_atuacao }}</b><br>
    Nome do supervisor(a) interno(a) do Estágio na Empresa: <b>{{ $empresa->nome_do_supervisor_estagio }}</b><br>
    Telefone: <b>{{ $empresa->telefone_do_supervisor_estagio }}</b> , E-mail: <b>{{ $empresa->email_do_supervisor_estagio }}</b><br>
    Data de início do estágio: <b>{{ \Carbon\Carbon::parse($estagio->dataini)->format('d/m/Y')}}</b><br>
    Data do término do estágio: <b>{{ \Carbon\Carbon::parse($estagio->datafin)->format('d/m/Y')}}</b><br>
    Horário do Estágio: <b>{{ $estagio->horario }}</b> Carga horária semanal: <b>{{ $estagio->cargahoras }}
    h{{ $estagio->cargaminutos }} semanais</b><br>
    Duração em meses (em casos excepcionais inferiores a 6 meses, a empresa deverá incluir justificativa circunstanciada
    que será avaliada pelo Supervisor Geral de Estágios): <b>{{ $estagio->duracao }}</b><br>
    Justificativa: <b><i>{{ $estagio->justificativa }}</i></b><br>{{ $pessoa::dump($estagio->numero_usp)['sexpes'] === "F" ? "a" : "o" }}
    Valor da Bolsa: R$ <b>{{ $estagio->valorbolsa }} {{ $estagio->tipobolsa }}</b><br>
    Valor do auxílio transporte: R$ <b>{{ $estagio->auxiliotransporte }} {{ $estagio->especifiquevt }}</b><br>
    Descrição detalhada das atividades a serem desenvolvidas pelo estagiário, com a finalidade de permitir a avaliação
    da Comissão de Estágios: <b><i>{{ $estagio->atividades }}</i></b><br>
    <p><b>NO CASO DE ESTÁGIO DOMICILIAR</b></p>
    <p>Como se dará o controle diário dos horários de início e encerramento das atividades?
        <b>{{ $estagio->controlehorario }}</b><br>
    <p>Como se dará a supervisão interna (por parte da empresa) do estagiário? <b>{{ $estagio->supervisao}}</b></p>
    <p>Como se dará a interação do estagiário com o ambiente e com os demais colaboradores da empresa? Haverá
        deslocamento para a empresa? Se sim, quais dias? <b>{{ $estagio->interacao }}</b></p>
    <p>Qual o endereço e em quais dias será realizado o estágio?<b>{{$estagio->enderecoedias}}</b></p>    
    <p><b>INFORMAÇÕES RELATIVAS A ESTÁGIO NO PERÍODO DE PANDEMIA</b></p>
    <p>O estágio será realizado em home-office?:</b> <b>{{$estagio->pandemiahomeoffice}}</b></p>
    <p>Em caso do estágio não ser home-office, quais as medidas sanitárias adotadas pela empresa são:</b> <b>{{$estagio->pandemiamedidas}}</b></p>

</div>

<br>

<div>São Paulo, {{ Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}</div>

<br>

<div style="font-style: italic; font-weight: bold;">
    _______________________________________________<br>
    {{ $empresa->nome_do_representante }}<br>
    Representante da {{ $empresa->nome }}<br><br>

    _______________________________________________<br>
    <b>{{ $empresa->nome }}</b><br><br>
    _______________________________________________<br>
    <b>{{ $pessoa::dump($presidente->numero_usp)['nompes'] }}</b><br>
    <b>Presidente da Comissão de Graduação da FFLCH/USP</b><br>
</div>

<p style="page-break-after: never;"></p>

@endsection('content')

@section('footer')
<div style="text-align: initial; font-weight: bold;">
    OS DOCUMENTOS (TERMO E PLANO) DEVEM SER ENTREGUES PARA ANÁLISE 10 DIAS ÚTEIS ANTES DO INÍCIO DO ESTÁGIO.<br>
    AO FINAL DE CADA SEMESTRE DE REALIZAÇÃO DO ESTÁGIO DEVERÁ SER ENTREGUE UM RELATÓRIO PESSOAL, NOS TERMOS DA LEI
    11.788, DA RESOLUÇÃO USP N. 5528.
</div>
@endsection