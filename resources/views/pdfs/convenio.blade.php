@extends('pdfs.fflch')

@section('content')
<p><center>FORMULÁRIO PARA ABERTURA DE CONVÊNIO</center></p>
<br>
<table style="border: 1px solid #000;">
<tr><td>
    <center><b>PERÍODO DE DURAÇÃO DO CONVÊNIO : 5 ANOS</b></center>
    <hr height="1" width="100%"></hr>
</td>
</tr>
<tr><td scope="row"><b>EMPRESA</b></td></tr>
<tr><td scope="row">Razão social:<b>%razao_social_da_empresa </b></td></tr>
<tr><td scope="row">CNPJ:<b> {{ $empresa->cnpj_da_empresa}}</b></td></tr>
<tr><td scope="row">Área de atuação (missão da Empresa): <b>{{ $empresa->area_de_atuacao_da_empresa}}</b></td></tr>
<tr><td scope="row">Endereço:<b> {{ $empresa->endereco_da_empresa}}</b></td></tr>
<tr><td scope="row">CEP:<b>%cep_da_empresa </b></td></tr>
<tr><td scope="row">Telefone:<b> {{ $empresa->telefone_do_supervisor_do_estagio}}</b></td></tr>
<tr><td scope="row">E-mail:<b> {{ $empresa->email_do_supervisor_do_estagio}}</b></td></tr>
</table>
<br>

<table style='border: 1px solid #000;'>
<tr><td scope="row"><b>Representante legal da Empresa que irá assinar o Termo de Convênio</b></td></tr>
<tr><td scope="row">Nome: <b>{{ $convenio->nome_rep }}</b></td></tr>
<tr><td scope="row">Cargo: <b>{{ $convenio->cargo_rep }}</b></td></tr>
<tr><td scope="row">E-mail: <b>{{ $convenio->email_rep }}</b></td></tr>
<tr><td scope="row">RG: <b>{{ $convenio->rg_rep }}</b></td></tr>
<tr><td scope="row">CPF: <b>{{ $convenio->cpf_rep }}</b></td></tr>
<tr><td scope="row"><br><b></b></td></tr>
<tr><td scope="row">Nome: {{ $convenio->nome_rep2 }}</td></tr>
<tr><td scope="row">Cargo: {{ $convenio->cargo_rep2 }}</td></tr>
<tr><td scope="row">E-mail: {{ $convenio->email_rep2 }}</td></tr>
<tr><td scope="row">RG: {{ $convenio->rg_rep2 }}</td></tr>
<tr><td scope="row">CPF: {{ $convenio->cpf_rep2 }}</td></tr>
<tr><td><b>É obrigatório o envio do documento que comprove o poder de representação do
responsável pela assinatura.<br></td>
<tr><td><b>Dúvidas para o e-mail: estagiosfflch@usp.br</td><tr>
</table>
<p>Descreva brevemente as condições de compatibilidade entre as atividades
oferecidas para estágio e a natureza dos cursos de nossa Faculdade: <b>{{ $convenio->desc }}</b></p>
<p>Atividades previstas para os estagiários: <b>{{ $convenio->ativ }}</b></p>
<br>

<table style='width:100%; border: 1px solid #000;'>
<tr><td scope="row"><b>Funcionário para contato</b></td></tr>
<tr><td scope="row">Nome: <b>{{ $convenio->nome_cont }}</b></td></tr>
<tr><td scope="row">Telefone: <b>{{ $convenio->tel_cont }}</b></td></tr>
<tr><td scope="row">E-mail: <b>{{ $convenio->email_cont }}</b></td></tr> 
</table>

<div style="text-align: right">São Paulo, {{ $now->format('d/m/Y')}}</div>
<p><b>No prazo máximo de 5(cinco) dias a minuta será enviada para conferência.</b>
</p>
@endsection('content')