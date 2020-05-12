<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VagaRequest;
use App\Vaga;

class VagaController extends Controller
{
    public function index(){
        $vagas = Vaga::all();
        return view('vagas.index', compact('vagas'));
    }

    public function show(Vaga $vaga){
        return view('vagas.show')->with('vaga', $vaga);
    }

    public function create(){
        return view('vagas.create')->with('vaga',new Vaga);
    }

    public function store(VagaRequest $request){
        
        $validated=$request->validated();    
        Vaga::create($validated);

        return redirect ('vagas/');
    }
    
    public function edit(Vaga $vaga) {
        return view('/vagas.edit')-> with('vaga', $vaga);
    }

    public function update(VagaRequest $request, Vaga $vaga){
        
        $validated = $request->validated(); 
        $vaga->update($validated);

        return redirect("/vagas/{$vaga->id}");
    }
}