<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PareceristaRequest;
use App\Parecerista;

class PareceristaController extends Controller
{
    public function index(Request $request){
        $pareceristas = Parecerista::get();
        return view('pareceristas.index',compact('pareceristas'));
    }

    public function show(Parecerista $parecerista){
        return view('pareceristas.show')->with('parecerista',$parecerista);
    }

    public function create(){
        return view('pareceristas.create')->with('parecerista',new Parecerista);
    }

    public function store(PareceristaRequest $request){
        $validated = $request->validated();
        Parecerista::create($validated);
        return redirect('/pareceristas/');
    }

    public function edit(Parecerista $parecerista) {
        return view('pareceristas.edit')->with('parecerista',$parecerista);
    }

    public function update(PareceristaRequest $request, Parecerista $parecerista){
        $validated = $request->validated();
        $parecerista->update($validated);
        return redirect("pareceristas/$parecerista->id");
    }
}
