<div class="card">
      <div class="card-header"><b>Informações Gerais</b></div>
        <div class="card-body">
            <b>Número USP:</b> {{$estagio->numero_usp}}<br>
            <b>Nome do(a) aluno(a):</b> {{ $estagio->nome }}<br>
            <b>Curso:</b> {{ $estagio->curso }}<br>
            <b>Média ponderada:</b> {{ $estagio->media_ponderada }}<br>
            <b>Periodo de Matrícula</b>: {{ $estagio->periodo }}<br>           
            <b>Valor da bolsa:</b> {{$estagio->valorbolsa}}<br>
            <b>Tipo de bolsa:</b> {{$estagio->tipobolsa}}<br>
            <b>Justificativa:</b> {{$estagio->justificativa}}<br>
            <b>Atividades a serem desenvolvidas:</b> {{$estagio->atividades}}<br>
            <b>O horário é compatível com o curso?:</b> {{$estagio->horariocompativel}}<br>
            <b>As ativídades são pertinentes ao curso?:</b> {{$estagio->atividadespertinentes}}<br> 
            <b>Justificativa da pertinencia:</b> {{$estagio->atividadesjustificativa}}<br>         
            <b>Desempenho acadêmico:</b> {{$estagio->desempenhoacademico}}<br>
            <b>Análise Acadêmica:</b> {{$estagio->analise_academica}}<br>
            <b>Situação do deferimento do parecer de mérito:</b> {{$estagio->tipodeferimento}}<br>
            @if(($estagio->condicaodeferimento)!=null)
                <b>O estágio foi reduzido para seis meses?:</b> {{$estagio->condicaodeferimento}}<br>
            @endif   
        </div>

    <br>

      <div class="card-header"><b>Informações Sobre a Empresa</b></div>
        <div class="card-body">
            <b>Nome da empresa:</b> {{ $estagio->empresa->nome }}<br>
            <b>CNPJ da empresa:</b> {{ $estagio->empresa->cnpj }}<br>
            <b>Área de Atuação:</b> {{ $estagio->empresa->area_de_atuacao }}<br>
            <b>Nome do supervisor do estágio:</b> {{$estagio->nome_do_supervisor_estagio}}<br>
            <b>Cargo do supervisor do estágio:</b> {{$estagio->cargo_do_supervisor_estagio}}<br>
            <b>Telefone do supervisor do estágio:</b> {{$estagio->telefone_do_supervisor_estagio}}<br>
            <b>E-mail do supervisor do estágio:</b> {{$estagio->email_do_supervisor_estagio}}<br>
            <b>Nome de contato da empresa:</b> {{$estagio->nome_de_contato}}<br>
            <b>Telefone de contato da empresa:</b> {{$estagio->telefone_de_contato}}<br>
            <b>E-mail de contato da empresa:</b> {{$estagio->email_de_contato}}<br>
            <b>Nome do representante da empresa:</b> @if($estagio->nome_do_representante_opcional) {{ $estagio->nome_do_representante_opcional }} @else {{ $estagio->empresa->nome_do_representante }} @endif<br>
            <b>Cargo do representante da empresa:</b> @if($estagio->cargo_do_representante_opcional) {{ $estagio->cargo_do_representante_opcional }} @else {{ $estagio->empresa->cargo_do_representante }} @endif<br>
            <b>E-mail do representante da empresa:</b> @if($estagio->email_do_representante_opcional) {{ $estagio->email_do_representante_opcional }} @else {{ $estagio->empresa->email }} @endif<br>
        </div>
      <br>

      <div class="card-header"><b>Período do Estágio</b></div>
        <div class="card-body">
            <b>Duração do estágio:</b> {{$estagio->duracao}}<br>
            <b>Data de início:</b> {{ $estagio->data_inicial }}<br>
            <b>Data de término:</b> {{ $estagio->data_final }}<br>
        </div>      

    <br>

      <div class="card-header"><b>Carga Horária Semanal (máximo 30 horas)</b></div>
        <div class="card-body">
            <b>Carga horária:</b> {{$estagio->cargahoras}} horas e {{$estagio->cargaminutos}} minutos.<br>
            <b>Horário do estágio:</b> {{$estagio->horario}}<br>
        </div>             

    <br>

      <div class="card-header"><b>Auxílio Transporte</b></div>
        <div class="card-body">
            <b>Valor do auxílio transporte:</b> {{$estagio->auxiliotransporte}}<br>
            <b>Tipo de auxílio:</b> {{$estagio->especifiquevt}}<br>
        </div>              

    <br>

      <div class="card-header"><b>Informações sobre seguro</b></div>
        <div class="card-body">
            <b>Seguradora:</b> {{$estagio->seguradora}}<br>
            <b>Número da apólice:</b> {{$estagio->numseguro}}<br>
        </div>            

    <br>

        <div class="card-header"><b>Informações em caso de estágio domiciliar</b></div>
            <div class="card-body">
                <b>Método de controle de horário:</b> {{$estagio->controlehorario}}<br>
                <b>Método de supervisão interna:</b> {{$estagio->supervisao}}<br>
                <b>Interação com ambiente, colaboradores e dias onde ocorrerá o deslocamento para a empresa:</b> {{$estagio->interacao}}<br>
                <b>Endereço e dias do estágio:</b> {{$estagio->enderecoedias}}<br>
        </div>       

    <br>