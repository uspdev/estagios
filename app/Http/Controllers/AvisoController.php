<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvisoController extends Controller
{
    public function create(){
        return view('avisos.create');
    }
    
    public function store(Request $request){
        echo $request->titulo . "<br>";
        echo $request->corpo;
        dd("Parece que deu certo");
    }
}
