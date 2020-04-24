@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<h4>Dados do Representante Legal </h4> </br>
    	Nome: {{$convenio->nome_rep}}</br>
    	Cargo: {{$convenio->cargo_rep}}</br>
    	Email: {{$convenio->email_rep}}</br>
    	RG: {{$convenio->rg_rep}}</br>
    	CPF: {{$convenio->cpf_rep}}</br>

    	</br><h4>Dados do Representante Legal Adicional</h4> </br>
    	Nome: {{$convenio->nome_rep2}}</br>
    	Cargo: {{$convenio->cargo_rep2}}</br>
    	Email: {{$convenio->email_rep2}}</br>
    	RG: {{$convenio->rg_rep2}}</br>
    	CPF: {{$convenio->cpf_rep2}}</br>

    	</br><h4>Dados da Compatibilidade e das Atividades do Estágio</h4> </br>
    	Descrição da compatibilidade: {{$convenio->desc}}</br>
    	Atividades: {{$convenio->ativ}}</br>
    	
    	</br><h4>Dados do Funcionário para Contato</h4> </br>
    	Nome: {{$convenio->nome_cont}}</br>
    	Telefone: {{$convenio->tel_cont}}</br>
    	Email: {{$convenio->email_cont}}</br>



@endsection('content')