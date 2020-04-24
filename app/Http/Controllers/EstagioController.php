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
        return view('estagios.show', compact('estagio'));
    }    

    public function create(){
        return view('estagios.create');
    }

    public function store(EstagioRequest $request)
    {
        $estagio = new Estagio;

        $estagio->valorbolsa = $request->valorbolsa;
        $estagio->tipobolsa = $request->tipobolsa;
        $estagio->justificativa = $request->justificativa;
        $estagio->dataini = $request->dataini;
        $estagio->datafin = $request->datafin;
        $estagio->cargahoras = $request->cargahoras;
        $estagio->cargaminutos = $request->cargaminutos;
        $estagio->horario = $request->horario;
        $estagio->auxtrans = $request->auxtrans;
        $estagio->especifiquevt = $request->especifiquevt;
        $estagio->atividades = $request->atividades;
        $estagio->seguradora  = $request->seguradora;
        $estagio->numseguro  = $request->numseguro;
        $estagio->save();
        return redirect('/');
    }
}