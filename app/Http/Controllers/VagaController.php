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
        return view('vagas.show', compact('vaga'));
    }

    public function create(){
        return view('vagas.create');
    }

    public function store(VagaRequest $request){

        $vaga = new Vaga;

        $vaga->titulo = $request->titulo;
        $vaga->descricao = $request->descricao;
        $vaga->expediente = $request->expediente;
        $vaga->salario = $request->salario;
        $vaga->horario = $request->horario;
        $vaga->beneficios = $request->beneficios;
        $vaga->save();
        return redirect('/');
    }
}