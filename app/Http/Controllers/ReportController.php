<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Estagio;
use App\Models\Empresa;
use Uspdev\Replicado\Pessoa;
use Rap2hpoutre\FastExcel\FastExcel;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request, Estagio $estagio, Empresa $empresa){
        $cursos = Estagio::whereNotNull('nomcur')->select('nomcur')->distinct()->get()->pluck('nomcur');

        if(!$request->start_date) {
            return view('reports.index')->with([
                'cursos' => $cursos
            ]);   
        }

        $request->validate([
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
            'cursos' => $cursos,
            'estagios' => $estagios->get()
        ]);
    }
}
