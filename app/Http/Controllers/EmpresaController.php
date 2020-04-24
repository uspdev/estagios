<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Empresa;

class EmpresaController extends Controller
{
    public function index(){
        $empresas = Empresa::all();
        return view('empresas.index', compact('empresas'));
    }

    public function show(Empresa $empresa){
        return view('empresas.show', compact('empresa'));
    }
    
    public function create(){
        return view ('empresas.create');
    }

    public function store(EmpresaRequest $request){
        $empresa = new Empresa;
        $empresa->nome_da_empresa = $request->nome_da_empresa;
        $empresa->cnpj_da_empresa = $request->cnpj_da_empresa;
        $empresa->area_de_atuacao_da_empresa = $request->area_de_atuacao_da_empresa;
        $empresa->endereco_da_empresa = $request->endereco_da_empresa;
        $empresa->nome_do_representante_da_empresa = $request->nome_do_representante_da_empresa;
        $empresa->cargo_do_representante_da_empresa = $request->cargo_do_representante_da_empresa;
        $empresa->nome_do_supervisor_do_estagio = $request->nome_do_supervisor_do_estagio;
        $empresa->cargo_do_supervisor_do_estagio = $request->cargo_do_supervisor_do_estagio;
        $empresa->telefone_do_supervisor_do_estagio = $request->telefone_do_supervisor_do_estagio;
        $empresa->email_do_supervisor_do_estagio = $request->email_do_supervisor_do_estagio;
        $empresa->save();
        return redirect('/');
        dd("Acho que tá tudo ok");   
    }
}
