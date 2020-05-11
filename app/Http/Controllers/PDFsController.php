<?php

namespace App\Http\Controllers;

use PDF;
use App\Estagio;
use App\Empresa;
use App\Convenio;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PDFsController extends Controller
{

    public function termo(Estagio $estagio){
        $cnpj = '29541003000114'; //$estagio->cnpj;
        $empresa = Empresa::where('cnpj_da_empresa',$cnpj)->first();
        //$presidente = Parecerista::where...

        $pdf = PDF::loadView('pdfs.termo', compact('estagio','empresa'));
        return $pdf->download('termo.pdf');

    }

    public function convenio(Convenio $convenio){
        $now = Carbon::now();
        $pdf = PDF::loadView('pdfs.convenio', compact('convenio', 'empresa', 'now'));
        return $pdf->download('convenio.pdf');
    }
    
    public function rescisao(Estagio $estagio, Empresa $empresa){
        $now = Carbon::now();
        $pdf = PDF::loadView('pdfs.rescisao', compact('estagio', 'empresa', 'now'));
        return $pdf->download('rescisao.pdf');
    }

    public function aditivo(Empresa $empresa){
        $now = Carbon::now();
        $pdf = PDF::loadView('pdfs.aditivo', compact('empresa', 'now'));
        return $pdf->download('aditivo.pdf');
    }

    public function renovacao(Estagio $estagio){
        $pdf = PDF::loadView('pdfs.renovacao', compact('estagio'));
        return $pdf->download('renovacao.pdf');
    }
}
