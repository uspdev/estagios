<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Estagio;

class EstudanteController extends Controller
{
    public function index()
    {
        $this->authorize('logado');

        return view('estudantes.index')->with([
            'estagios' => Estagio::where('numero_usp', auth()->user()->codpes)->get()
        ]);
    }
}
