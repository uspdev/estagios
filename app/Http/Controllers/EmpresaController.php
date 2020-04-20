<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    //
    public function create(){
        return view ('empresas.create');
    }

    public function store(Request $request){
        echo $request->nome_da_empresa;
        echo $request->cnpj_da_empresa;
        echo $request->area_de_atuacao_da_empresa;
        echo $request->endereco_da_empresa;
        echo $request->nome_do_representante_da_empresa;
        echo $request->cargo_do_representante_da_empresa;
        echo $request->nome_do_supervisor_do_estagio;
        echo $request->cargo_do_supervisor_do_estagio;
        echo $request->telefone_do_supervisor_do_estagio;
        echo $request->email_do_supervisor_do_estagio;
        dd("Acho que tá tudo ok");   
    }
}
