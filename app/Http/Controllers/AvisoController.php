<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AvisoRequest;
use App\Aviso;

class AvisoController extends Controller
{
    public function index(){
        $avisos = Aviso::all();
        return view('avisos.index',compact('avisos'));
    }

    public function show(Aviso $aviso){
        return view('avisos.show',compact('aviso'));
    }

    public function create(){
        return view('avisos.create');
    }
    
    public function store(AvisoRequest $request){

        $aviso = new Aviso;

        $aviso->titulo = $request->titulo;
        $aviso->corpo = $request->corpo;
        $aviso->save();
        return redirect('/');
    }
}
