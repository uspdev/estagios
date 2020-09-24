<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConvenioRequest;
use App\Models\Convenio;

class ConvenioController extends Controller
{

    public function index(Request $request){

        $this->authorize('admin');
        if(isset($request->busca)) {
    $convenio = Convenio::where('nome_representante','LIKE',"%{$request->busca}%")->paginate(10);
} else {
    $convenio = Convenio::paginate(10);
}
        return view('convenios.index')->with('convenios',$convenio);
    }
    public function show(Convenio $convenio){
        $this->authorize('admin');
        return view('convenios.show')->with('convenio',$convenio);
    }
    
    public function create(){
      $this->authorize('admin');
    	return view('convenios.create')->with('convenio', new Convenio);
    }
     public function edit(Convenio $convenio){
        $this->authorize('admin');

         return view('convenios.edit')->with('convenio',$convenio);
    }

      public function store(ConvenioRequest $request){
        $this->authorize('admin');

        $validated = $request->validated();
          
        if($validated['nome_representante2'] == NULL){
            $validated['nome_representante2'] = "";
            $validated['cargo_representante2'] = "";
            $validated['email_representante2'] = "";
            $validated['rg_representante2'] = "";
            $validated['cpf_representante2'] = "";
            }

       Convenio::create($validated);

       
     return redirect('/convenios');
    	
    }

     public function update(ConvenioRequest $request, Convenio $convenio){
      
        $this->authorize('admin');

        $validated = $request->validated();

          
        if($validated['nome_representante2'] == NULL){
            $validated['nome_representante2'] = "";
            $validated['cargo_representante2'] = "";
            $validated['email_representante2'] = "";
            $validated['rg_representante2'] = "";
            $validated['cpf_representante2'] = "";
            }
               
        $convenio->update($validated);
        return redirect("/convenios/$convenio->id");
      
        
    }
    public function destroy(Convenio $convenio){
      dd("Delete não habilitado na produção");
      $this->authorize('admin');

      $convenio->delete();
      return redirect('/convenios');
      
        
    }


}
  


