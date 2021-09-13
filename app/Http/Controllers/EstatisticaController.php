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

            $request->validate([
                'busca_ano' => 'required|numeric',
            ]);
            
            // retorno de variaveis em caso de pesquisa por data

            if ($request->busca_ano != null){

                $total_estagios = Estagio::whereYear('created_at', '=', $request->busca_ano)->count();

                $total_concluidos = Estagio::whereYear('data_inicial', '=', $request->busca_ano)->where('status','=','concluido')->orWhereYear('data_final', '=', $request->busca_ano)->count();
        
                $total_renovados = Estagio::whereYear('created_at', '=', $request->busca_ano)->where('renovacao_parent_id','!=',null)->count();
        
                $total_rescindidos = Estagio::whereYear('rescisao_data', '=', $request->busca_ano)->where('status','=','rescisao')->count();
        
                $total_empresas = Empresa::whereYear('created_at', '=', $request->busca_ano)->count();

                $total_bachfilosofia = Estagio::whereYear('created_at', '=', $request->busca_ano)->where('graduacao','=','Bacharelado em Filosofia')->count();

                $total_licfilosofia = Estagio::whereYear('created_at', '=', $request->busca_ano)->where('graduacao','=','Licenciatura em Filosofia')->count();
        
                $total_bachhistoria = Estagio::whereYear('created_at', '=', $request->busca_ano)->where('graduacao','=','Bacharelado em Historia')->count();
        
                $total_lichistoria = Estagio::whereYear('created_at', '=', $request->busca_ano)->where('graduacao','=','Licenciatura em Historia')->count();
        
                $total_bachgeografia = Estagio::whereYear('created_at', '=', $request->busca_ano)->where('graduacao','=','Bacharelado em Geografia')->count();
        
                $total_licgeografia = Estagio::whereYear('created_at', '=', $request->busca_ano)->where('graduacao','=','Licenciatura em Geografia')->count();
        
                $total_bachsociais = Estagio::whereYear('created_at', '=', $request->busca_ano)->where('graduacao','=','Bacharelado em Ciencias Sociais')->count();
        
                $total_licsociais = Estagio::whereYear('created_at', '=', $request->busca_ano)->where('graduacao','=','Licenciatura em Ciencias Sociais')->count();
        
                $total_bachletras = Estagio::whereYear('created_at', '=', $request->busca_ano)->where('graduacao','LIKE',"%"."bacharelado - habilitacao"."%")->count();
        
                $total_licletras = Estagio::whereYear('created_at', '=', $request->busca_ano)->where('graduacao','LIKE',"%"."licenciatura - habilitacao"."%")->count();
        
                $total_basicoletras = Estagio::whereYear('created_at', '=', $request->busca_ano)->where('graduacao','=','Letras - Ciclo Básico')->count();

            }

        }else{

        // retorno de variaveis gerais

        $total_estagios = Estagio::get('id')->count();

        $total_concluidos = Estagio::where('status','=','concluido')
        ->orWhere('status','=','em_alteracao')->count();

        $total_renovados = Estagio::where('renovacao_parent_id','!=',null)->count();

        $total_rescindidos = Estagio::where('status','=','rescisao')->count();

        $total_empresas = Empresa::get('id')->count();

        $total_bachfilosofia = Estagio::where('graduacao','=','Bacharelado em Filosofia')->count();

        $total_licfilosofia = Estagio::where('graduacao','=','Licenciatura em Filosofia')->count();

        $total_bachhistoria = Estagio::where('graduacao','=','Bacharelado em Historia')->count();

        $total_lichistoria = Estagio::where('graduacao','=','Licenciatura em Historia')->count();

        $total_bachgeografia = Estagio::where('graduacao','=','Bacharelado em Geografia')->count();

        $total_licgeografia = Estagio::where('graduacao','=','Licenciatura em Geografia')->count();

        $total_bachsociais = Estagio::where('graduacao','=','Bacharelado em Ciencias Sociais')->count();

        $total_licsociais = Estagio::where('graduacao','=','Licenciatura em Ciencias Sociais')->count();

        $total_bachletras = Estagio::where('graduacao','LIKE',"%"."bacharelado - habilitacao"."%")->count();

        $total_licletras = Estagio::where('graduacao','LIKE',"%"."licenciatura - habilitacao"."%")->count();

        $total_basicoletras = Estagio::where('graduacao','=','Letras - Ciclo Básico')->count();

        }

        return view('estatisticas.index')->with([
            'total_estagios' => $total_estagios,
            'total_concluidos' => $total_concluidos,
            'total_renovados' => $total_renovados,
            'total_rescindidos' => $total_rescindidos,
            'total_empresas' => $total_empresas,
            'busca_ano' => $request->busca_ano,
            'total_bachfilosofia' => $total_bachfilosofia,
            'total_licfilosofia' => $total_licfilosofia,
            'total_bachhistoria' => $total_bachhistoria,
            'total_lichistoria' => $total_lichistoria,
            'total_bachgeografia' => $total_bachgeografia,
            'total_licgeografia' => $total_licgeografia,
            'total_bachsociais' => $total_bachsociais,
            'total_licsociais' => $total_licsociais,
            'total_bachletras' => $total_bachletras,
            'total_licletras' => $total_licletras,
            'total_basicoletras' => $total_basicoletras,
        ]);
    }
}
