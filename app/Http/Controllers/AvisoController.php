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
        $aviso->divulgacao_home_ate = implode('/',array_reverse(explode('-',$aviso->divulgacao_home_ate)));
        return view('avisos.show')->with('aviso',$aviso);
    }

    public function create(){
        return view('avisos.create')->with('aviso',new Aviso);
    }
    
    public function store(AvisoRequest $request){

        $validated = $request->validated();

        $validated['divulgacao_home_ate'] = implode('-',array_reverse(explode('/',$validated['divulgacao_home_ate'])));
        
        Aviso::create($validated);

        return redirect('/avisos/');
    }

    public function edit(Aviso $aviso) {
        $aviso ->divulgacao_home_ate = implode('/',array_reverse(explode('-',$aviso->divulgacao_home_ate)));
        return view('avisos.edit')->with('aviso',$aviso);
    }

    public function update(AvisoRequest $request, Aviso $aviso){

        $validated = $request->validated();

        $validated['divulgacao_home_ate'] = implode('-',array_reverse(explode('/',$validated['divulgacao_home_ate'])));
        
        $aviso->update($validated);

        return redirect("avisos/$aviso->id");
    }
}
