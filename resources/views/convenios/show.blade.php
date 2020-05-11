@extends('laravel-usp-theme::master')

@section('content')
@include('flash')

<div class="card">
  <div class="card-header"><h4>Representante legal da Empresa que irá assinar o Termo de Convênio</h4></div>
    <div class="card-body">  
      <div class="form-group row">
        <div class="col-sm-10">
         Nome: {{$convenio->nome_representante}}
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
         Cargo: {{$convenio->cargo_representante}}
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
         Email: {{$convenio->email_representante}}
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
         RG: {{$convenio->rg_representante}}
        </div>
      </div>
     <div class="form-group row">
        <div class="col-sm-10">
         CPF: {{$convenio->cpf_representante}}
        </div>
      </div>

  </div>  
</div>
</br>
 
<div class="card">
  <div class="card-header"><h4>Dados do Representante Legal Adicional</h4></div>
    <div class="card-body">  
      <div class="form-group row">
        <div class="col-sm-10">
         Nome: {{$convenio->nome_representante2}}
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
         Cargo: {{$convenio->cargo_representante2}}
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
         Email: {{$convenio->email_representante2}}
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
         RG: {{$convenio->rg_representante2}}
        </div>
      </div>
     <div class="form-group row">
        <div class="col-sm-10">
         CPF: {{$convenio->cpf_representante2}}
        </div>
      </div>

  </div>  
</div>
</br>

<div class="card">
  <div class="card-header"><h4>Dados da Compatibilidade e das Atividades do Estágio</h4></div>
    <div class="card-body">  
      <div class="form-group row">
        <div class="col-sm-10">
         Nome: {{$convenio->descricao}}
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
         Cargo: {{$convenio->atividade}}
        </div>
      </div>
      

  </div>  
</div>
</br>

<div class="card">
  <div class="card-header"><h4>Dados do Funcionário para Contato</h4></div>
    <div class="card-body">  
      <div class="form-group row">
        <div class="col-sm-10">
       Nome: {{$convenio->nome_contato}}
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
        Telefone: {{$convenio->tel_contato}}
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
       Email: {{$convenio->email_contato}}
        </div>
      </div>

  </div>  
</div>
</br>



@endsection('content')