<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Empresa;

class EmpresaController extends Controller
{
    public function index(Request $request){
        if(isset($request->busca)) {
            $empresas = Empresa::where('nome','LIKE',"%{$request->busca}%")->paginate(20);
        } else {
            $empresas = Empresa::paginate(20);
        }        
        return view('empresas.index', compact('empresas'));
    }

    public function show(Empresa $empresa){
        return view('empresas.show', compact('empresa'));
    }
    
    public function create(){
        return view ('empresas.create')->with('empresa', new Empresa);
    }

    public function store(EmpresaRequest $request){
        $validated = $request->validated();
        Empresa::create($validated);
        return redirect('/empresas');
    }

    public function edit(Empresa $empresa){
        return view('empresas.edit')->with('empresa', $empresa);
    }

    public function update(EmpresaRequest $request, Empresa $empresa){
        $validated = $request->validated();
        $empresa->update($validated);
        return redirect("/empresas/$empresa->id");
    }
}
