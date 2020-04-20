<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvenioController extends Controller
{
    public function create(){
    	return view('convenios.create');
    }

      public function store(Request $request){
      	echo"<h4>Dados do Representante Legal </h4> </br>";
    	echo "Nome: ".$request->nome_rep."</br>";
    	echo "Cargo: ".$request->cargo_rep."</br>";
    	echo "Email: ".$request->email_rep."</br>";
    	echo "RG: ".$request->rg_rep."</br>";
    	echo "CPF: ".$request->cpf_rep."</br>";

    	echo"</br><h4>Dados do Representante Legal Adicional</h4> </br>";
    	echo "Nome: ".$request->nome_rep2."</br>";
    	echo "Cargo: ".$request->cargo_rep2."</br>";
    	echo "Email: ".$request->email_rep2."</br>";
    	echo "RG: ".$request->rg_rep2."</br>";
    	echo "CPF: ".$request->cpf_rep2."</br>";

    	echo"</br><h4>Dados da Compatibilidade e das Atividades do Estágio</h4> </br>";
    	echo "Descrição da compatibilidade: ".$request->desc."</br>";
    	echo "Atividades: ".$request->ativ."</br>";
    	
    		echo"</br><h4>Dados do Funcionário para Contato</h4> </br>";
    	echo "Nome: ".$request->nome_cont."</br>";
    	echo "Telefone: ".$request->tel_cont."</br>";
    	echo "Email: ".$request->email_cont."</br>";
    
    	
    }
}
  


