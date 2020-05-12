@extends('pdfs.fflch')

@section('content')
<div style="width: 100%"><b>INFORMAÇÃO IMPORTANTE</b>
<br><br><br>
Rescisão do Estágio
<br><br><br><br><br><br>
Os documentos de rescisão devem estar acompanhados de um relatório pessoal do
aluno(digitado, datado e assinado), relatando sua experiência no período do
estágio.
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<hr height="10" width="100%"></hr>
<b>É OBRIGATORIO ANEXAR RELATÓRIO PESSOAL DO ALUNO(DIGITADO E ASSINADO).</b>
</div>
<br><br><br><br>
<table style="width: 100%">
<tr>
<td style="border: 1px solid #000;">
    <center><b>RESCISÃO DE TERMO DE COMPROMISSO DE ESTÁGIO</b></center>
</td>
</tr>
</table>
<br><br><br><br>
<div style="width: 100%">
Comunicamos que em <b>%data_da_rescisao</b> foi/será rescindido o Termo de Compromisso de
Estágio firmado em <b>{{ $estagio->dataini }}</b> entre <b>{{ $empresa->nome_da_empresa }}</b>, CNPJ
<b>{{ $empresa->cnpj_da_empresa}}</b> e o(a) estagiário(a) <b>%nome_do_estagiario</b>, nº USP <b>%usp</b>, regularmente matriculado no curso de 
<b>%curso</b> com interveniência da Universidade de São Paulo.
<br>
<br>
Informamos que o referido estágio foi rescindido na data supracitada pelo seguinte
motivo: <b>%motivo %outro_descreva </b>
<br>
<br>
E por estarem de inteiro e comum acordo assinam-na em três vias de igual teor,
cabendo a 1a à Unidade Concedente, a 2a ao Estagiário e a 3a à Instituição de
Ensino.
<br>
<br>
São Paulo, {{ $now->format('d/m/Y') }}<br><br>
______________________________________<br>
<b>%responsavel_pelo_estagio</b>
<br>
<br>
_____________________________________<br>
<b>%nome_do_estagiario</b>
<br>
<br>
______________________________________<br>
<b>Profa. Dra. Mona Mohamad Hawi
Presidente da Comissão de Graduação da FFLCH/USP</b>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
Telefone do Estagiário(a): ----
<hr height="1" width="100%"></hr>
<b>É OBRIGATORIO ANEXAR RELATÓRIO PESSOAL DO ALUNO(DIGITADO E ASSINADO).<b>
</div>
@endsection('content')