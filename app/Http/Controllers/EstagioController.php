<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EstagioRequest;
use App\Estagio;

class EstagioController extends Controller
{
    public function index()
    {
        $estagios = Estagio::all();
        return view('estagios.index', compact('estagios'));
    }

    public function show(Estagio $estagio)
    {
        return view('estagios.show')->with('estagio',$estagio);
    }    

    public function create(){
        return view('estagios.create')->with('estagio',new Estagio);
    }

    public function store(EstagioRequest $request)
    {
        $validated = $request->validated();
        $validated['data_inicial'] = implode('-',array_reverse(explode('/',$validated['data_inicial'])));
        $validated['data_final'] = implode('-',array_reverse(explode('/',$validated['data_final'])));                    
        Estagio::create($validated);        
        return redirect('estagios/');
    }

    public function edit(Estagio $estagio) {
        $estagio->data_inicial = date('d/m/Y', strtotime($estagio->data_inicial));
        $estagio->data_final = date('d/m/Y', strtotime($estagio->data_final));        
        return view ('estagios.edit')->with('estagio',$estagio);
    }

    public function update(EstagioRequest $request, Estagio $estagio)
    {
        $validated = $request->validated();
        $validated['data_inicial'] = implode('-',array_reverse(explode('/',$validated['data_inicial'])));
        $validated['data_final'] = implode('-',array_reverse(explode('/',$validated['data_final'])));                    
        $estagio->update($validated); 
        return redirect("estagios/{$estagio->id}");
    }
}