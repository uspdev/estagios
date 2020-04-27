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


        $validated = $request->validated;
        Convenio::create($validated);

       
        return redirect('/convenios');
    	
    }

     public function update(ConvenioRequest $request, Convenio $convenio){

       
        $validated = $request->validated;
        $convenio->update($validated);
        return redirect("/convenios/$convenio->id");
        
    }


}
  


