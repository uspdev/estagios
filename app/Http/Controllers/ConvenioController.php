<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConvenioRequest;
use App\Convenio;

class ConvenioController extends Controller
{
    public function index(){

        $convenios = Convenio::all();
        return view('convenios.index', compact('convenios'));
    }
    public function show(Convenio $convenio){

        return view('convenios.show', compact('convenio'));
    }
    public function create(){
    	return view('convenios.create');
    }

      public function store(ConvenioRequest $request){

        $convenio = new Convenio;

        $convenio->nome_rep = $request->nome_rep;
        $convenio->cargo_rep = $request->cargo_rep;
        $convenio->email_rep = $request->email_rep;
        $convenio->rg_rep = $request->rg_rep;
        $convenio->cpf_rep = $request->cpf_rep;

        $convenio->nome_rep2 = $request->nome_rep2;
        $convenio->cargo_rep2 = $request->cargo_rep2;
        $convenio->email_rep2 = $request->email_rep2;
        $convenio->rg_rep2 = $request->rg_rep2;
        $convenio->cpf_rep2 = $request->cpf_rep2;

        $convenio->desc = $request->desc;
        $convenio->ativ = $request->ativ;

        $convenio->nome_cont = $request->nome_cont;
        $convenio->tel_cont = $request->tel_cont;
        $convenio->email_cont = $request->email_cont;

        $convenio->save();
        return redirect('/');
    	
    }
}
  


