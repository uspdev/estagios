<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AvisoRequest;
use App\Models\Aviso;

class AvisoController extends Controller
{
    public function index(Request $request){

        $this->authorize('admin');
        if(isset($request->busca)) {
            $avisos = Aviso::where('titulo','LIKE',"%{$request->busca}%")->paginate(10);
        } else {
        $avisos = Aviso::paginate(15);
        }

        return view('avisos.index')->with('avisos',$avisos);
    }

    public function show(Aviso $aviso){

        $this->authorize('admin');

        return view('avisos.show')->with('aviso',$aviso);
    }

    public function create(){

        $this->authorize('admin');

        return view('avisos.create')->with('aviso',new Aviso);
    }
    
    public function store(AvisoRequest $request){

        $this->authorize('admin');

        $validated = $request->validated();

        Aviso::create($validated);

        return redirect('/avisos/');
    }

    public function edit(Aviso $aviso) {

        $this->authorize('admin');

        return view('avisos.edit')->with('aviso',$aviso);
    }

    public function update(AvisoRequest $request, Aviso $aviso){

        $this->authorize('admin');

        $validated = $request->validated();
        
        $aviso->update($validated);

        return redirect("avisos/$aviso->id");
    }

    public function destroy(Aviso $aviso){

        $this->authorize('admin');

        $aviso->delete();
        return redirect('/avisos');
    }
}
