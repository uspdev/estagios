<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VagaController extends Controller
{
    public function create(){
        return view('vagas.create');
    }

    public function store(Request $request){
        echo $request->titulo . "<br>";
        echo $request->descricao . "<br>";
        echo $request->expediente . "<br>";
        echo $request->salario . "<br>";
        echo $request->horario . "<br>";
        echo $request->beneficios . "<br>";

        dd("Parece que deu certo");
    }
}