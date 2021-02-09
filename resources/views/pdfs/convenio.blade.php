@extends('pdfs.fflch')

@inject('pessoa','Uspdev\Replicado\Pessoa')
@inject('graduacao','Uspdev\Replicado\Graduacao')
@inject('replicado_utils','App\Utils\ReplicadoUtils')

@section('content')
<div style="border: 1px solid #000; text-align: center;">
    <b>FORMULÁRIO PARA ABERTURA DE CONVÊNIO</b>
</div><br>
<div style="text-align: center;">
    PERÍODO DE DURAÇÃO DO CONVÊNIO : 5 ANOS
</div>

<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: justify; padding: 0px;">
<b style="text-align: center;">EMPRESA</b><br>
Razão social:<b> {{ $empresa->razao_social }} </b><br>
CNPJ:<b> {{ $empresa->cnpj}}</b><br>
Área de atuação (missão da Empresa): <b>{{ $empresa->area_de_atuacao }}</b><br>
Endereço:<b> {{ $empresa->endereco }}</b><br>
CEP:<b> {{ $empresa->cep }}</b><br>
Telefone:<b> {{ $empresa->telefone_do_supervisor_estagio}}</b><br>
E-mail:<b> {{ $empresa->email_do_supervisor_estagio}}</b>
</div<br>

<div style="border-width: 1px; border-style: solid; border-color: #000; text-align: justify; padding: 0px;">
<b style="text-align: center;">Representante legal da Empresa que irá assinar o Termo de Convênio</b><br>
Nome: <b>{{ $convenio->nome_representante }}</b><br>
Cargo: <b>{{ $convenio->cargo_representante }}</b><br>
E-mail: <b>{{ $convenio->email_representante }}</b><br>
RG: <b>{{ $convenio->rg_representante }}</b><br>
CPF: <b>{{ $convenio->cpf_representante }}</b><br>
Nome: {{ $convenio->nome_representante2 }}</b><br>
Cargo: {{ $convenio->cargo_representante2 }}</b><br>
E-mail: {{ $convenio->email_representante2 }}</b><br>
RG: {{ $convenio->rg_representante2 }}</b><br>
CPF: {{ $convenio->cpf_representante2 }}</b><br>
<b>É obrigatório o envio do documento que comprove o poder de representação do
responsável pela assinatura.</b><br>
Dúvidas para o e-mail: estagiosfflch@usp.br
</div>

<p>Descreva brevemente as condições de compatibilidade entre as atividades
oferecidas para estágio e a natureza dos cursos de nossa Faculdade: <b>{{ $convenio->descricao }}</b></p>
<p>Atividades previstas para os estagiários: <b>{{ $convenio->atividade }}</b></p>

<div style="page-break-inside: avoid;">
<table style='border: 1px solid #000;'>
<tr><td scope="row"><b>Funcionário para contato</b></td></tr>
<tr><td scope="row">Nome: <b>{{ $convenio->nome_contato }}</b></td></tr>
<tr><td scope="row">Telefone: <b>{{ $convenio->tel_contato }}</b></td></tr>
<tr><td scope="row">E-mail: <b>{{ $convenio->email_contato }}</b></td></tr> 
</table>

<div style="text-align: center;">São Paulo, {{ Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}</div>
</div>

<p style="page-break-after: never;"></p>


@endsection('content')

@section('footer')

<div style="text-align: initial; font-weight: bold;">No prazo máximo de 5(cinco) dias a minuta será enviada para conferência.</div>

@endsection
