@extends('pdfs.fflch')

@section('content')
<table style="width: 100%">
<tr>
<td style="border: 1px solid #000;">
    <center><b>ADITIVO DE ALTERAÇÕES NO TERMO DE COMPROMISSO</b></center>
</td>
</tr>
</table>
<hr height="1" width="100%"></hr>
<br>
<div style="text-align: justify"><p style="text-indent : 6em;"><b>{{ $empresa->nome_da_empresa }},CNPJ {{ $empresa->cnpj_da_empresa }},</b> representada por seu(a) <b>{{ $empresa->cargo_do_representante_da_empresa }}, {{ $empresa->nome_do_representante_da_empresa }}</b> adiante designada CONCEDENTE e o
ESTAGIÁRIO(A) <b>%estagiarioa</b>, no USP <b>%usp</b>, curso <b>%curso</b> e como INTERVENIENTE a Faculdade de Filosofia, Letras e Ciências
Humanas da Universidade de São Paulo, representada pela Presidente da Comissão de Graduação 
<b>Profa. Dra. Mona Mohamad Hawi</b>, firmam o presente TERMO DE ADITAMENTO DE COMPROMISSO DE ESTÁGIO, nos termos da Lei
11.788/08 e da Resolução USP no 5.528/09, conforme as condições a seguir:</p></div>
<p>1. Alterações a serem feitas a partir de <b>%alteracoes_a_serem_feitas</b></p>
<p><b>%alteracoes</b></p>
<div style="text-align: justify">2. Permanecem inalteradas as demais cláusulas do Termo de Compromisso de
Estágio, inclusive o Plano de Estágios, do qual passa a fazer parte integrante o
presente Termo Aditivo, ficando sem efeito as disposições em contrário.<br>
<p style="text-indent : 6em;">E por estarem de comum acordo, as partes acima identificadas assinam o
presente Termo Aditivo em 03(três) vias de igual teor, em papel timbrado ou com
carimbo contendo o CNPJ da empresa, para que produza seus jurídicos efeitos.</p><br>
São Paulo, {{ $now->format('d/m/Y') }}
</div>
<br>
<br>
<div>
________________________________________<br>
<b>{{ $empresa->nome_da_empresa }}</b>
<br>
<br>
________________________________________<br>
<b>%estagiarioa</b>
<br>
<br>
________________________________________<br>
<b>Profa. Dra. Mona Mohamad Hawi</b><br>
<b>Presidente da Comissão de Graduação da FFLCH</b>
<br><br>
Tel. do estagiário: %telefone_do_estagiario, e-mail: %e_mail_do_estagiario<br>
Contato: %nome_da_pessoa_para_contato, tel.: %telefones_para_contato, e-mail: %e_mail_para_contato
<br><br>
<hr height="1" width="100%"></hr>
<b>O PRAZO PARA DEVOLUÇÃO DO DOCUMENTO É DE 15 DIAS ÚTEIS.
AO FINAL DE CADA SEMESTRE O ESTAGIÁRIO DEVE APRESENTAR O RELATÓRIO DE
ESTÁGIO, NOS TERMOS DA LEI 11.788, DA RESOLUÇÃO USP N. 5528.</b>
</div>
@endsection('content')