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

        return view('convenios.show')->with('convenio',$convenio);
    }
    
    public function create(){
    	return view('convenios.create')->with('convenio', new Convenio);
    }
     public function edit(Convenio $convenio){
         return view('convenios.edit')->with('convenio',$convenio);
    }

      public function store(ConvenioRequest $request){

  

        $validated = $request->validated();
        $limpar = array(".", "-", "(", ")");
     $validated['cpf_rep'] = str_replace($limpar, "", $request->cpf_rep);
     $validated['cpf_rep2'] = str_replace($limpar, "", $request->cpf_rep2);
       $validated['tel_cont'] = str_replace($limpar, "", $request->tel_cont);
       if($validated['nome_rep2'] == NULL){
          $validated['nome_rep2'] = "";
        $validated['cargo_rep2'] = "";
        $validated['email_rep2'] = "";
        $validated['rg_rep2'] = "";
        $validated['cpf_rep2'] = "";
       }
       Convenio::create($validated);

       
     return redirect('/convenios');
    	
    }

     public function update(ConvenioRequest $request, Convenio $convenio){
      
       $validated = $request->validated();
        $limpar = array(".", "-", "(", ")");
     $validated['cpf_rep'] = str_replace($limpar, "", $request->cpf_rep);
     $validated['cpf_rep2'] = str_replace($limpar, "", $request->cpf_rep2);
       $validated['tel_cont'] = str_replace($limpar, "", $request->tel_cont);
     
       
       $convenio->update($validated);
       return redirect("/convenios/$convenio->id");
      
        
    }


}
  


