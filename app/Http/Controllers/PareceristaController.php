<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PareceristaRequest;
use App\Parecerista;

class PareceristaController extends Controller
{
    public function index(){
        $pareceristas = Parecerista::all();
        return view('pareceristas.index',compact('pareceristas'));
    }

    public function show(Parecerista $parecerista){
        return view('pareceristas.show',compact('parecerista'));
    }

    public function create(){
        return view('pareceristas.create');
    }

    public function store(PareceristaRequest $request){

        $parecerista = new Parecerista;
        $parecerista->numero_usp = $request->numero_usp;
        $parecerista->nome = $request->nome;
        $parecerista->save();
        return redirect('/');

    }
}
