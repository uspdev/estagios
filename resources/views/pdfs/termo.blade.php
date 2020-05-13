@extends('pdfs.fflch')


@inject('pessoa','Uspdev\Replicado\Pessoa')
@inject('graduacao','Uspdev\Replicado\Graduacao')

@inject('replicado_utils','App\Utils\ReplicadoUtils')

@section('content')

<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: center; padding: 0px;">
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
    <p>Ciência d{{ $pessoa::dump($estagio->numero_usp)['sexpes'] === "F" ? "a" : "o" }}
        alun{{ $pessoa::dump($estagio->numero_usp)['sexpes'] === "F" ? "a" : "o" }}
        {{ $pessoa::dump($estagio->numero_usp)['nompes'] }}:</p>
</div>

<br><br>

<div>
    _______________________________<br>
    <b>{{ $pessoa::dump($estagio->numero_usp)['nompes'] }}</b><br>
    Nº USP: <b>{{ $estagio->numero_usp }}</b><br>
    <b>{{ $graduacao::curso($estagio->numero_usp, 8)['nomhab'] }}</b>
</div>

<p style="page-break-after: always;"></p>

<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: center; padding: 0px;">
    <b>TERMO DE COMPROMISSO</b>
</div>

<div style="text-align: justify;">
    <p style="text-indent : 1em;"><b>{{ $empresa->razao_social }}, {{ $empresa->endereco }}, CNPJ
            {{ $empresa->cnpj }}</b>, representada por
        s{{ $pessoa::dump($estagio->numero_usp)['sexpes'] === "F" ? "ua" : "eu" }}
        <b>{{ $empresa->cargo_do_representante }}</b>, Sr(a)
        <b>{{ $empresa->nome_do_representante }}</b>, adiante designada CONCEDENTE e
        {{ $pessoa::dump($estagio->numero_usp)['sexpes'] === "F" ? "a" : "o" }} ESTAGIÁRIO
        <b>{{ $pessoa::dump($estagio->numero_usp)['nompes'] }}</b>, estudante, residente a <b>{{ $replicado_utils->enderecoCompleto($estagio->numero_usp) }}</b>, portador da cédula de identidade
        {{ $pessoa::dump($estagio->numero_usp)['tipdocidf'] }} n°
        <b>{{ $pessoa::dump($estagio->numero_usp)['numdocidf'] }}</b> e CPF nº
        <b>{{ $pessoa::dump($estagio->numero_usp)['numcpf'] }}</b>, aluno do Curso de
        <b>{{ $graduacao::curso($estagio->numero_usp, 8)['nomcur'] }}</b>, nº USP
        <b>{{ $estagio->numero_usp }}</b>, e como INTERVENIENTE a UNIVERSIDADE DE SÃO PAULO, autarquia estadual de
        regime especial, regida por seu Estatuto, aprovado pela Resolução nº 3.461, de 07 de outubro de 1988, e pelo
        Regimento Geral, aprovado
        pela Resolução nº 3.745, de 19 de outubro de 1990, com sede em São Paulo (Capital), inscrita no CNPJ-MF sob nº
        63.025.530/0001-04, adiante denominada USP, no interesse da Faculdade de Filosofia, Letras e Ciências Humanas,
        localizada à Rua do Lago, 717, na Cidade Universitária “Armando de Salles Oliveira, Butantã, São Paulo, neste
        ato representada pel{{ $pessoa::dump($estagio->numero_usp)['sexpes'] === "F" ? "a" : "o" }} Presidente da
        Comissão de Graduação, <b>{{ $pessoa::dump($presidente->numero_usp)['nompes'] }}</b>, da mencionada
        Faculdade, celebram o presente TERMO DE COMPROMISSO DE ESTÁGIO, que se vincula ao convênio para Realização de
        Estágio firmado entre a CONCEDENTE e a INSTITUIÇÃO DE ENSINO nos termos da Lei no 9.394/96 e da Lei nº
        11.788/08, conforme as condições a seguir:</p>
    <p>1. O estágio terá duração de <b>12 meses</b>, a começar em
        <b>{{ \Carbon\Carbon::parse($estagio->dataini)->format('d/m/Y')}}</b> terminando em
        <b>{{ \Carbon\Carbon::parse($estagio->datafin)->format('d/m/Y')}}</b> que poderá
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
    <p>3. A CONCEDENTE designa o Sr(a). <b>{{ $empresa->nome_do_representante }}</b>, que ocupa o cargo de
        <b>{{ $empresa->cargo_do_representante }}</b>,
        para ser o(a) SUPERVISOR(a) INTERNO(a) do Estágio que será por ele programado.</p>
    <p>4. O ESTAGIÁRIO se obriga a cumprir fielmente a programação do estágio, salvo impossibilidade da qual a
        CONCEDENTE será previamente informada.</p>
    <p>5. O ESTAGIÁRIO receberá BOLSA DE COMPLEMENTAÇÃO EDUCACIONAL DE <b>R$ {{ $estagio->valorbolsa }}</b>
        {{ $estagio->tipobolsa}} e
        auxílio-transporte no
        valor de R$ <b>{{ $estagio->auxiliotransporte }} {{ $estagio->especifiquevt }}</b>. A importância referente à bolsa, por
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
        cancele sua matrícula na instituição de Ensino INTERVENIENTE, ficando ele responsável por quaisquer despesas
        causadas pela ausência dessa informação.</p>
    <p>10. A Instituição de Ensino INTERVENIENTE supervisionará o estágio de conformidade com os seus regulamentos
        internos, ficando o ESTAGIÁRIO sujeito a essa regulamentação.</p>
    <p>10.1.Como supervisora, a INSTITUIÇÃO DE ENSINO INTERVENIENTE indica
        <b>{{ $pessoa::dump($presidente->numero_usp)['nompes'] }}</b>.</p>
    <p>E, por estarem de acordo com os termos do presente instrumento, <b>as partes o assinam em 03 (três) vias</b>, na
        presença de duas testemunhas para todos os fins e efeitos de direito.</p>
</div>

<div>São Paulo, {{ Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}</div>

<br><br>

<div style="font-style: italic; font-weight: bold">
    ________________________________________________<br>
    {{ $empresa->razao_social }}
    <br><br><br>
    _______________________________________________<br>
    {{ $pessoa::dump($estagio->numero_usp)['nompes'] }}<br><br><br>
    ________________________________________________<br>
    {{ $pessoa::dump($presidente->numero_usp)['nompes'] }}<br>
    Presidente da Comissão de Graduação da FFLCH-USP
</div>

<br>

<div>
    &nbsp;&nbsp;TESTEMUNHAS:<br><br>
    ______________________________________<br><br>
    ______________________________________
</div>

<p style="page-break-after: always;"></p>

<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: center; padding: 0px;">
    <b>PLANO DE ESTÁGIO</b>
</div>

<br>

<div style="text-align: justify">
    Solicitação: <b>ESTÁGIO NOVO</b><br>
    Nome do Estagiári{{ $pessoa::dump($estagio->numero_usp)['sexpes'] === "F" ? "a" : "o" }}
    {{ $pessoa::dump($estagio->numero_usp)['nompes'] }}: <b>{{ $pessoa::dump($estagio->numero_usp)['nompes'] }}</b><br>
    Nº USP: <b>{{ $estagio->numero_usp }}</b><br>
    Curso: <b>{{ $graduacao::curso($estagio->numero_usp, 8)['nomhab'] }}</b><br>
    Semestre: <b>{{ $replicado_utils->semestreAtual($estagio->numero_usp) }}º</b><br>
    Turno: <b>Noturno</b><br>
    Telefone: <b>(11) 96307-1952</b>, E-mail: <b>{{ $pessoa::email($estagio->numero_usp) }}</b><br>
    Nome da Empresa: <b>{{ $empresa->nome }}</b><br>
    Área de atuação da Empresa: <b>{{ $empresa->area_de_atuacao }}</b><br>
    Nome do supervisor(a) interno(a) do Estágio na Empresa: <b>{{ $empresa->nome_do_supervisor_estagio }}</b><br>
    Telefone: <b>{{ $empresa->telefone_do_supervisor_estagio }}</b> / <b>{{ $empresa->telefone_de_contato }}</b>,
    E-mail: <b>{{ $empresa->email_do_supervisor_estagio }}</b><br>
    Data de início do estágio: <b>{{ \Carbon\Carbon::parse($estagio->dataini)->format('d/m/Y')}}</b><br>
    Data do término do estágio: <b>{{ \Carbon\Carbon::parse($estagio->datafin)->format('d/m/Y')}}</b><br>
    Horário do Estágio: <b>{{ $estagio->horario }}</b><br>
    Carga horária semanal: <b>{{ $estagio->cargahoras }}h{{ $estagio->cargaminutos }} semanais</b><br>
    Duração em meses (em casos excepcionais inferiores a 6 meses, a empresa deverá incluir justificativa circunstanciada
    que será avaliada pelo Supervisor Geral de Estágios): <b>{{ $estagio->duracao }}</b><br>
    Justificativa: <b><i>{{ $estagio->justificativa }}</i></b><br>
    Número de horas por semana: <b>{{ $estagio->cargahoras }}h{{ $estagio->cargaminutos }} semanais</b><br>
    Valor da Bolsa: R$ <b>{{ $estagio->valorbolsa }} {{ $estagio->tipobolsa }}</b><br>
    Valor do auxílio transporte: R$ <b>{{ $estagio->auxiliotransporte }} {{ $estagio->especifiquevt }}</b><br>
    Descrição detalhada das atividades a serem desenvolvidas pelo estagiário, com a finalidade de permitir a avaliação
    da Comissão de Estágios: <b><i>{{ $estagio->atividades }}</i></b><br>
    <p><b>NO CASO DE ESTÁGIO DOMICILIAR</b></p>
    <p>Como se dará o controle diário dos horários de início e encerramento das atividades?
        {{ $estagio->controlehorario }}</p><br>
    <p>Como se dará a supervisão interna (por parte da empresa) do estagiário? {{ $estagio->supervisao}}</p><br>
    <p>Como se dará a interação do estagiário com o ambiente e com os demais colaboradores da empresa? Haverá
        deslocamento para a empresa? Se sim, quais dias? {{ $estagio->interacao }}</p>
</div>

<br>

<div>São Paulo, {{ Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}</div>

<br>

<div style="font-style: italic; font-weight: bold">
    _____________________________________<br>
    {{ $empresa->nome_do_representante }}<br><br>
    _____________________________________<br>
    {{ $pessoa::dump($estagio->numero_usp)['nompes'] }}<br><br>
    _____________________________________<br>
    {{ $pessoa::dump($presidente->numero_usp)['nompes'] }} <br>
    Presidente da Comissão de Graduação da FFLCH/USP
</div>

<div>
    <p>Contato: {{ $empresa->nome_de_contato }}, Telefone: {{ $empresa->telefone_de_contato }}, E-mail:
        {{ $empresa->email_de_contato }}
    </p>
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