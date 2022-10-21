<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Estagio;
use App\Models\Empresa;
use App\Models\File;
use Uspdev\Replicado\Pessoa;
use App\Http\Requests\EstagioRequest;

class EstudanteController extends Controller
{
    public function index(Request $request, Estagio $estagio)
    {
        $this->authorize('logado');
        $codpes = auth()->user()->codpes;
        $estagios = Estagio::where('numero_usp', $codpes)->get();

        return view('estudantes.index')->with([
            'estagios' => $estagios
        ]);
    }
}
