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

class EstatisticaController extends Controller
{
    public function index(Request $request, Estagio $estagio, Empresa $empresa){

        if(isset($request->busca_ano)){
            
            if ($request->busca_ano != null){

                $total_estagios = Estagio::whereYear('created_at', '=', $request->busca_ano)->count();

                $total_ativos = Estagio::whereYear('updated_at', '=', $request->busca_ano)->where('status','=','concluido')->count();
        
                $total_renovados = Estagio::whereYear('updated_at', '=', $request->busca_ano)->where('renovacao_parent_id','!=',null)->count();
        
                $total_rescindidos = Estagio::whereYear('updated_at', '=', $request->busca_ano)->where('status','=','rescisao')->count();
        
                $total_empresas = Empresa::whereYear('created_at', '=', $request->busca_ano)->count();

            }

        }else{

        $total_estagios = Estagio::get('id')->count();

        $total_ativos = Estagio::where('status','=','concluido')
        ->orWhere('status','=','em_alteracao')->count();

        $total_renovados = Estagio::where('renovacao_parent_id','!=',null)->count();

        $total_rescindidos = Estagio::where('status','=','rescisao')->count();

        $total_empresas = Empresa::get('id')->count();

        }

        return view('estatisticas.index')->with([
            'total_estagios' => $total_estagios,
            'total_ativos' => $total_ativos,
            'total_renovados' => $total_renovados,
            'total_rescindidos' => $total_rescindidos,
            'total_empresas' => $total_empresas,
        ]);
    }
}
