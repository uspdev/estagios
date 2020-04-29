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

        $estagio->numero_usp = $request->numero_usp;
        $estagio->valorbolsa = $request->valorbolsa;
        $estagio->tipobolsa = $request->tipobolsa;
        $estagio->justificativa = $request->justificativa;
        $estagio->data_inicial = implode('-',array_reverse(explode('/',$request->data_inicial)));
        $estagio->data_final = implode('-',array_reverse(explode('/',$request->data_final)));
        $estagio->cargahoras = $request->cargahoras;
        $estagio->cargaminutos = $request->cargaminutos;
        $estagio->horario = $request->horario;
        $estagio->auxiliotransporte = $request->auxiliotransporte;
        $estagio->especifiquevt = $request->especifiquevt;
        $estagio->cnpj = $request->cnpj;       
        $estagio->atividades = $request->atividades;
        $estagio->seguradora  = $request->seguradora;
        $estagio->numseguro  = $request->numseguro;
        $estagio->controlehorario  = $request->controlehorario;
        $estagio->supervisao  = $request->supervisao;     
        $estagio->interacao  = $request->interacao;
        $estagio->enderecoedias  = $request->enderecoedias;                     
        $estagio->save();
        return redirect('/');
    }
}