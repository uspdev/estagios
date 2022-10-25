<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Estagio;
use Carbon\Carbon;

class EstatisticaController extends Controller
{
    private $cursos;

    public function __construct(Estagio $estagio){
        $this->cursos = $estagio->nomcurOptions();
    }

    public function index(Request $request){

        if(!$request->start_date) {
            return view('estatisticas.index')->with([
                'cursos' => $this->cursos
            ]);   
        }

        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        
        $start_date = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
        $end_date = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');

        $estagios = Estagio::whereBetween('data_inicial', [$start_date, $end_date]);

        if($request->curso) {
            $estagios = $estagios->where('nomcur',$request->curso);
        }

        return view('estatisticas.index')->with([
            'cursos' => $this->cursos,
            'estagios' => $estagios->get()
        ]);
    }
}
