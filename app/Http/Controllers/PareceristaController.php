<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PareceristaController extends Controller
{
    public function create(){
        return view('pareceristas.create');
    }

    public function store(Request $request){
        echo $request->numero_usp . "<br>";
        echo $request->nome;
        dd("Parece que deu certo");
    }
}
