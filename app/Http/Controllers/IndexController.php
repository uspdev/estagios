<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uspdev\Replicado\Pessoa;
use App\Models\Vaga;
use App\Models\Aviso;

class IndexController extends Controller
{
    public function index(Request $request){
        $avisos = Aviso::whereDate('divulgacao_home_ate','>=',date('Y-m-d'))->get();
        $vagas = Vaga::whereDate('divulgar_ate','>=',date('Y-m-d'))->get();

        return view('index')
            ->with('avisos',$avisos)
            ->with('vagas',$vagas);
    }

}