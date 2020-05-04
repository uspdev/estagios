<?php

namespace App\Http\Controllers;
use PDF;
use App\Estagio;
use App\Empresa;
use Carbon\Carbon;


use Illuminate\Http\Request;

class PDFsController extends Controller
{

    public function convenio(){
        $pdf = PDF::loadView('pdfs.convenio');
        return $pdf->download('convenio.pdf');
    }
    
    public function rescisao(){
        $pdf = PDF::loadView('pdfs.rescisao');
        return $pdf->download('rescisao.pdf');
    }

    public function aditivo(){
        $pdf = PDF::loadView('pdfs.aditivo');
        return $pdf->download('aditivo.pdf');
    }

    public function renovacao(Estagio $estagio){
        $pdf = PDF::loadView('pdfs.renovacao', compact('estagio'));
        return $pdf->download('renovacao.pdf');
    }

    public function termo(Estagio $estagio){
        $pdf = PDF::loadView('pdfs.termo', compact('estagio'));
        return $pdf->download('termo.pdf');

    }
}
