@extends('pdfs.fflch')

@section('content')

<div style="width:100%; border-width: 1px; border-style: solid; border-color: #000; text-align: center; padding: 0px;">
    <b>TERMO DE CIÊNCIA</b>
</div>

<br><br><br><br><br>

<div style="text-align: justify;">
    <p style="text-indent : 3em;">Os documentos, impressos e assinados, devem ser entregues com pelo menos 10 dias úteis
        antes do início estágio.</p>
    <br>
    <p style="text-indent : 3em;">É obrigatória a entrega de um relatório pessoal (digitado, datado, assinado e com no
        mínimo 7 linhas) no término desse estágio, relatando sua experiência no período.</p>
    <br>
    <p style="text-indent : 3em; font-weight: bold">Uma via deste termo de Ciência deve ser entregue com o Termo de
        Compromisso e Plano de Estágio.</p>
    <br>
    <p>Ciência d{{ $estagio->artigo_definido }}
        alun{{ $estagio->artigo_definido}}
        {{ $estagio->nome }}:</p>
</div>

<br><br>

<div>
    _______________________________________________<br>
    <b>{{ $estagio->nome }}</b><br>
    Nº USP: <b>{{ $estagio->numero_usp }}</b><br>
    <b>{{ $estagio->curso }}</b>
</div>

<p style="page-break-after: always;"></p>

<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: center; padding: 0px;">
    <b>TERMO DE COMPROMISSO</b>
</div>

<div style="text-align: justify;">
    <p style="text-indent : 1em;"><b>{{ $estagio->empresa->nome }}, {{ $estagio->empresa->endereco }}, CEP {{ $estagio->empresa->cep }}, CNPJ
            {{ $estagio->empresa->cnpj }}</b>, representada por
        {{ $estagio->pronome_possessivo }}
        <b>@if($estagio->cargo_do_representante_opcional) {{ $estagio->cargo_do_representante_opcional }} @else {{ $estagio->empresa->cargo_do_representante }} @endif</b>, Sr(a)
        <b>@if($estagio->nome_do_representante_opcional) {{ $estagio->nome_do_representante_opcional }} @else {{ $estagio->empresa->nome_do_representante }} @endif</b>, adiante designada CONCEDENTE e
        {{ $estagio->artigo_definido }} ESTAGIÁRIO
        <b>{{ $estagio->nome }}</b>, estudante, residente a <b>{{ $estagio->endereco }}</b>,
        portador da cédula de identidade {{ $estagio->tipo_identidade }} n°
        <b>{{ $estagio->identidade }}</b> e CPF nº
        <b>{{ $estagio->cpf }}</b>, aluno do Curso de
        <b>{{ $estagio->curso }}</b>, nº USP
        <b>{{ $estagio->numero_usp }}</b>, e como INTERVENIENTE a UNIVERSIDADE DE SÃO PAULO, autarquia estadual de
        regime especial, regida por seu Estatuto, aprovado pela Resolução nº 3.461, de 07 de outubro de 1988, e pelo
        Regimento Geral, aprovado
        pela Resolução nº 3.745, de 19 de outubro de 1990, com sede em São Paulo (Capital), inscrita no CNPJ-MF sob nº
        63.025.530/0001-04, adiante denominada USP, no interesse da Faculdade de Filosofia, Letras e Ciências Humanas,
        localizada à Rua do Lago, 717, na Cidade Universitária “Armando de Salles Oliveira, Butantã, São Paulo, neste
        ato representada pel{{ $estagio->artigo_definido }} Presidente da
        Comissão de Graduação, <b>{{ \App\Models\Parecerista::nomePresidente() }}</b>, da mencionada
        Faculdade, celebram o presente TERMO DE COMPROMISSO DE ESTÁGIO, que se vincula ao convênio para Realização de
        Estágio firmado entre a CONCEDENTE e a INSTITUIÇÃO DE ENSINO nos termos da Lei no 9.394/96 e da Lei nº
        11.788/08, conforme as condições a seguir:</p>
    <p>1. O estágio terá duração de <b>{{ $estagio->duracao }}</b>, a começar em
        <b>{{$estagio->data_inicial}}</b> terminando em
        <b>{{$estagio->data_final}}</b> que poderá
        ser eventualmente prorrogado ou modificado por documento complementar <b>(TERMO ADITIVO)</b>.</p>
    <p>1.1. Qualquer das partes poderá pedir rescisão, com 05 (cinco) dias de antecedência.</p>
    <p>1.2. O estagiário não terá vínculo empregatício de qualquer natureza com a CONCEDENTE em razão deste TERMO DE
        COMPROMISSO</p>
    <p>2. No período de estágio, o estagiário cumprirá <b>{{ $estagio->cargahoras }}h{{ $estagio->cargaminutos }}
            semanais</b>. O horário de estágio será combinado
        de acordo com as conveniências mútuas, ressalvadas as horas de aulas, de provas e de outros trabalhos didáticos
        e as limitações dos meios de transportes.</p>
    <p>2.1. Nos períodos de avaliação do rendimento escolar, conforme informado pelo estágiário, a jornada de atividade
        em estágio será reduzida à metade, sem desconto no valor da bolsa.</p>
    <p>3. A CONCEDENTE designa o Sr(a). <b>{{ $estagio->nome_do_supervisor_estagio }}</b>, que ocupa o cargo de
        <b>{{$estagio->cargo_do_supervisor_estagio}}</b>,
        para ser o(a) SUPERVISOR(a) INTERNO(a) do Estágio que será por ele programado.</p>
    <p>4. O ESTAGIÁRIO se obriga a cumprir fielmente a programação do estágio, salvo impossibilidade da qual a
        CONCEDENTE será previamente informada.</p>
    <p>5. O ESTAGIÁRIO receberá BOLSA DE COMPLEMENTAÇÃO EDUCACIONAL DE <b>R$ {{ $estagio->valorbolsa }}</b>
        {{ $estagio->tipobolsa}} e
        auxílio-transporte no
        valor de R$ <b>{{ $estagio->auxiliotransporte }} {{ $estagio->especifiquevt }}</b>. A importância referente à
        bolsa, por
        não ter natureza
        salarial, não se enquadra no regime do FGTS (Fundo de Garantia por Tempo de Serviço) e não sofrerá qualquer
        desconto, inclusive
        previdenciário, exceção feita à retenção do imposto de renda na fonte, quando devido.</p>
    <p>5.1.O estagiário terá direito, sempre que o estágio tenha duração igual ou superior a 1 (um) ano, a um período de
        recesso de 30 (trinta) dias, a ser gozado preferencialmente durante suas férias escolares.</p>
    <p>5.2. O recesso de que trata este artigo deverá ser remunerado quando o estagiário receber bolsa ou outra forma de
        contraprestação.</p>
    <p>5.3. Os dias de recesso previstos neste artigo serão concedidos de maneira proporcional, nos casos de o estágio
        ter duração inferior a 1(um) ano.</p>
    <p>6. Quando, em razão da programação do estágio, o aluno tiver despesas extras, a CONCEDENTE providenciará o seu
        pronto reembolso.</p>
    <p>7. O ESTAGIÁRIO se obriga a cumprir as normas e os regulamentos internos da CONCEDENTE, pela inobservância dessas
        normas, o ESTAGIÁRIO responderá por perdas e danos e a rescisão do compromisso.</p>
    <p>7.1 O estagiário declara ter conhecimento e estar de acordo que toda contribuição prática ou intelectual
        desenvolvida em função de suas tarefas como estagiário são de propriedade da Empresa Concedente, não tendo
        direito de subtrair, na totalidade ou em parte, programas, documentos ou arquivos.</p>
    <p>8. O ESTAGIÁRIO está segurado contra acidentes pessoais, pela Apólice de Seguros <b>nº
            {{ $estagio->numseguro }}</b>,
        que está compatível com valores de mercado, da <b>{{ $estagio->seguradora }}</b>.</p>
    <p>9. O ESTAGIÁRIO deverá informar de imediato e por escrito à CONCEDENTE qualquer fato que interrompa, suspenda ou
        cancele sua matrícula nas disciplinas da instituição de Ensino INTERVENIENTE, ficando ele responsável por quaisquer despesas
        causadas pela ausência dessa informação.</p>
    <p>10. A Instituição de Ensino INTERVENIENTE supervisionará o estágio de conformidade com os seus regulamentos
        internos, ficando o ESTAGIÁRIO sujeito a essa regulamentação.</p>
    <p>10.1.Como supervisora, a INSTITUIÇÃO DE ENSINO INTERVENIENTE indica
        <b>{{ \App\Models\Parecerista::nomePresidente() }}</b>.</p>
    <p>E, por estarem de acordo com os termos do presente instrumento, <b>as partes o assinam em 03 (três) vias</b>, na
        presença de duas testemunhas para todos os fins e efeitos de direito.</p>
</div>

<div style="page-break-inside: avoid;">

<div style="text-align: center;">São Paulo, {{ Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}</div>

<br><br>

<div style="font-style: italic; font-weight: bold">
    ________________________________________________<br>
    {{ $estagio->empresa->nome }}
    <br><br><br>
    _______________________________________________<br>
    {{ $estagio->nome }}<br><br><br>
    ________________________________________________<br>
    {{ \App\Models\Parecerista::nomePresidente() }}<br>
    Presidente da Comissão de Graduação da FFLCH-USP
</div>

</div>

<p style="page-break-after: always;"></p>

<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: center; padding: 0px;">
    <b>PLANO DE ESTÁGIO</b>
</div>

<div style="text-align: justify; page-break-inside: auto;">
    <b>Solicitação: ESTÁGIO NOVO</b><br>
    <b>Nome d{{ $estagio->artigo_definido}} Estagiári{{ $estagio->artigo_definido }}:</b> {{ $estagio->nome }}<br>
    <b>Nº USP:</b> {{ $estagio->numero_usp }}<br>
    <b>Telefone:</b>
        @if(isset($fones))
            {{  $fones }} <br> 
        @else 
            Não possui telefone cadastrado.<br>
        @endif   
    <b>Curso:</b> {{ $estagio->curso }}<br>
    <b>Período:</b> {{ $estagio->periodo }}<br>
    <b>E-mail:</b> {{ $estagio->email }}<br>
    <b>Nome da Empresa:</b> {{ $estagio->empresa->nome }}<br>
    <b>Área de atuação da Empresa:</b> {{ $estagio->empresa->area_de_atuacao }}<br>
    <b>Nome do supervisor(a) interno(a) do Estágio na Empresa:</b> {{ $estagio->nome_do_supervisor_estagio }}<br>
    <b>Telefone do Supervisor:</b> {{ $estagio->telefone_do_supervisor_estagio }} / {{ $estagio->telefone_de_contato }},
    <b>E-mail do Supervisor:</b> {{ $estagio->email_do_supervisor_estagio }}<br>
    <b>Nome do Representante da Empresa:</b> @if($estagio->nome_do_representante_opcional) {{ $estagio->nome_do_representante_opcional }} @else {{ $estagio->empresa->nome_do_representante }} @endif <br>
    <b>Cargo do Representante da Empresa:</b> @if($estagio->cargo_do_representante_opcional) {{ $estagio->cargo_do_representante_opcional }} @else {{ $estagio->empresa->cargo_do_representante }} @endif <br>
    <b>E-mail do Representante da Empresa:</b> @if($estagio->email_do_representante_opcional) {{ $estagio->email_do_representante_opcional }} @else {{ $estagio->empresa->email }} @endif<br>
    <b>Data de início do estágio:</b> {{$estagio->data_inicial}}<br>
    <b>Data do término do estágio:</b> {{$estagio->data_final}}<br>
    <b>Horário do Estágio:</b> {{ $estagio->horario }}<br>
    <b>Carga horária semanal:</b> {{ $estagio->cargahoras }}h{{ $estagio->cargaminutos }} semanais<br>
    <b>Duração em meses (em casos excepcionais inferiores a 6 meses, a empresa deverá incluir justificativa circunstanciada
    que será avaliada pelo Supervisor Geral de Estágios):</b> {{ $estagio->duracao }}<br>
    <b>Justificativa:</b> {{ $estagio->justificativa }}<br>
    <b>Número de horas por semana:</b> {{ $estagio->cargahoras }}h{{ $estagio->cargaminutos }} semanais<br>
    <b>Valor da Bolsa:</b> R$ {{ $estagio->valorbolsa }} {{ $estagio->tipobolsa }}<br>
    <b>Valor do auxílio transporte:</b> R$ {{ $estagio->auxiliotransporte }} {{ $estagio->especifiquevt }}<br>
    <b>Descrição detalhada das atividades a serem desenvolvidas pelo estagiário, com a finalidade de permitir a avaliação
    da Comissão de Estágios:</b> {{ $estagio->atividades }}<br>
    <b>NO CASO DE ESTÁGIO DOMICILIAR</b><br>
    <b>Como se dará o controle diário dos horários de início e encerramento das atividades?</b> {{ $estagio->controlehorario }}<br>
    <b>Como se dará a supervisão interna (por parte da empresa) do estagiário?</b> {{ $estagio->supervisao}}<br>
    <b>Como se dará a interação do estagiário com o ambiente e com os demais colaboradores da empresa? Haverá
    deslocamento para a empresa? Se sim, quais dias?</b> {{ $estagio->interacao }}<br>
    <b>Qual o endereço e em quais dias será realizado o estágio?</b>{{$estagio->enderecoedias}}<br>
</div>

<div style="page-break-inside: avoid;">

<br><br>

<div style="text-align: center;">São Paulo, {{ Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}</div>

<br><br>

    <br>
    _______________________________________________<br>
    @if($estagio->nome_do_representante_opcional) {{ $estagio->nome_do_representante_opcional }} @else {{ $estagio->empresa->nome_do_representante }} @endif<br>
    Representante da {{ $estagio->empresa->nome }}<br><br>
    _______________________________________________<br>
    {{ $estagio->nome }}<br><br>
    _______________________________________________<br>
    {{ \App\Models\Parecerista::nomePresidente() }} <br>
    Presidente da Comissão de Graduação da FFLCH/USP

    <br><br><br>

<div>
    <p><b>Contato:</b> {{ $estagio->nome_de_contato }}, Telefone: {{ $estagio->telefone_de_contato }} <br>
    <b>E-mail da empresa:</b> @if($estagio->email_do_representante_opcional) {{ $estagio->email_do_representante_opcional }} @else {{ $estagio->empresa->email }} @endif
    </p>
</div>

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
