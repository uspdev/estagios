<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Estagio;
use Carbon\Carbon;

class ReportController extends Controller
{
    private $cursos;

    public function __construct(Estagio $estagio){
        $this->cursos = $estagio->nomcurOptions();
    }

    public function index(){
        return view('reports.index')->with([
            'cursos' => $this->cursos
        ]);   
    }    

    public function report(Request $request){
        $request->validate([   //form request 
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        
        $start_date = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
        $end_date = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');

        $estagios = Estagio::whereBetween('data_final', [$start_date, $end_date])->orderBy('data_final', 'asc');

        if($request->curso) {
            $estagios = $estagios->where('nomcur',$request->curso);
        }
        
        return view('reports.index')->with([
            'cursos' => $this->cursos,
            'estagios' => $estagios->paginate()
        ]);
    }
}
