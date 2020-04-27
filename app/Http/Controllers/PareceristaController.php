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
        /* Fazer inversão */
        $parecerista->acesso_ate = '10/11/1986';
        return view('pareceristas.show')->with('parecerista',$parecerista);
    }

    public function create(){
        return view('pareceristas.create')->with('parecerista',new Parecerista);
    }

    public function store(PareceristaRequest $request){

        $validated = $request->validated();

        $validated['acesso_ate'] = implode('-',array_reverse(explode('/',$validated['acesso_ate'])));

        Parecerista::create($validated);
        
        return redirect('/pareceristas/');
    }

    public function edit(Parecerista $parecerista) {
        $parecerista->acesso_ate = '10/11/1986';
        return view('pareceristas.edit')->with('parecerista',$parecerista);
    }

    public function update(PareceristaRequest $request, Parecerista $parecerista){

        $validated = $request->validated();
        $validated['acesso_ate'] = implode('-',array_reverse(explode('/',$validated['acesso_ate'])));
        $parecerista->update($validated);

        return redirect("pareceristas/$parecerista->id");
    }
}
