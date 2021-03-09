@extends('main') 

@section('content')
@include('flash')


<div class="row">
  <div class="col-sm">
    <button type="submit" class="btn btn-success">
    <a href="{{ route('convenios.edit',$convenio->id) }}">Editar</a>
    </button>

  </div>
</div>
</br>    

<div class="row">
  <div class="col-sm">
    <form method="POST" action="/convenios/{{$convenio->id}}">
      @csrf
      @method('delete')
      <button type="submit"><i class="fas fa-trash-alt"></i></button>
            
    </form> 

  </div>
</div>
</br>     

<div class="card">
  <div class="card-header"><h4>Representante legal da Empresa que irá assinar o Termo de Convênio</h4></div>
    <div class="card-body">
      <div class="form-group row">
        <div class="col-sm-10">
         CNPJ: {{$convenio->cnpj}}
        </div>
      </div>  
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
</div>
</br>




@endsection('content')