<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VagaRequest;
use App\Models\Vaga;
use Auth;
use Illuminate\Support\Facades\Gate;

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
        if ( Gate::allows('empresa',$vaga->cnpj) | Gate::allows('admin') ) {
            return view('/vagas.edit')-> with('vaga', $vaga);
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
    }

    public function update(VagaRequest $request, Vaga $vaga){
        if ( Gate::allows('empresa',$vaga->cnpj) | Gate::allows('admin') ) {
            $this->authorize('admin_ou_empresa',$vaga->cnpj);;
            $validated = $request->validated();
            $vaga->update($validated);
            return redirect("/vagas/{$vaga->id}");
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
    }

    public function destroy(Vaga $vaga){
        if ( Gate::allows('empresa',$vaga->cnpj) | Gate::allows('admin') ) {
            $vaga->delete();
            return redirect('/');
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
    }
}