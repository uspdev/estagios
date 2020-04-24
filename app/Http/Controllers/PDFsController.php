<?php

namespace App\Http\Controllers;
use PDF;

use Illuminate\Http\Request;

class PDFsController extends Controller
{
    public function renovacao(){
        $pdf = PDF::loadView('pdfs.renovacao');
        return $pdf->download('renovacao.pdf');
    }

    public function termo(){
        $pdf = PDF::loadView('pdfs.termo');
        return $pdf->download('termo.pdf');
    }
}
