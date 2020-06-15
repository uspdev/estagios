<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VagaRequest;
use App\Vaga;
use Auth;

class VagaController extends Controller
{
    public function index(Request $request){
        
        $this->authorize('empresa');
        $cnpj = Auth::user()->cnpj;
        $vagas = Vaga::where('cnpj',$cnpj)->paginate(10);
        return view('vagas.index')->with('vagas',$vagas);
    }

    public function show(Vaga $vaga){       
        return view('vagas.show')->with('vaga', $vaga);
    }

    public function create(){
        $this->authorize('empresa');
        return view('vagas.create')->with('vaga',new Vaga);
    }

    public function store(VagaRequest $request){

        $this->authorize('empresa');
        
        $validated = $request->validated();
        $validated['cnpj'] = Auth::user()->cnpj;
        $vaga = Vaga::create($validated);

        return redirect ("vagas/{$vaga->id}");
    }
    
    public function edit(Vaga $vaga) {
        $this->authorize('empresa',$vaga->cnpj);

        return view('/vagas.edit')-> with('vaga', $vaga);
    }

    public function update(VagaRequest $request, Vaga $vaga){

        $this->authorize('admin_ou_empresa',$vaga->cnpj);;
        $validated = $request->validated();
        $vaga->update($validated);
        return redirect("/vagas/{$vaga->id}");
    }

    public function destroy(Vaga $vaga){
        $this->authorize('admin_ou_empresa',$vaga->cnpj);
        $vaga->delete();
        return redirect('/vagas');
    }
}