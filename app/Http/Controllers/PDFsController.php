<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Estagio;
use App\Models\Empresa;
use App\Models\Convenio;
use App\Models\Parecerista;
use App\Models\User;

use Uspdev\Replicado\Pessoa;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Gate;

class PDFsController extends Controller
{

    public function termo(Estagio $estagio){
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$estagio->cnpj)) {
            $pdf = PDF::loadView('pdfs.termo', [
                'estagio'    => $estagio,
            ]);
            return $pdf->download("termo-{$estagio->numero_usp}.pdf");
        }
        abort(403, 'Access denied');
    }
    
    public function rescisao(Estagio $estagio){
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$estagio->cnpj)) {
            $pdf = PDF::loadView('pdfs.rescisao', [
                'estagio'    => $estagio,
            ]);
            return $pdf->download("rescisao-{$estagio->numero_usp}.pdf");
        }
        abort(403, 'Access denied');
    }

    public function aditivo(Estagio $estagio, Request $request){
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$estagio->cnpj)) {
            if($request->aditivo_action == 'pendente'){
                $aditivopendente=true;   
            }else{
                $aditivopendente=null;  
            };
            $pdf = PDF::loadView('pdfs.aditivo', [
                'estagio'    => $estagio,
                'aditivopendente' => $aditivopendente,
            ]);
            return $pdf->download("aditivo-{$estagio->numero_usp}.pdf");
        }
        abort(403, 'Access denied');
    }

    public function renovacao(Estagio $estagio){
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$estagio->cnpj)) {
            $pdf = PDF::loadView('pdfs.renovacao', [
                'estagio'    => $estagio,
            ]);
            return $pdf->download("renovacao-{$estagio->numero_usp}.pdf");
        }
        abort(403, 'Access denied');
    }

    public function parecer(Estagio $estagio){
        if (Gate::allows('admin') | Gate::allows('parecerista') ) {
            if($estagio->numparecerista){
                $pdf = PDF::loadView('pdfs.parecer', [
                    'estagio'    => $estagio,
                ]);
                return $pdf->download("parecer-{$estagio->numero_usp}.pdf");
            } else {
                request()->session()->flash('alert-danger','PDF não foi gerado! Informe o parecerista!');
                return redirect("/estagios/{$estagio->id}") ;
            }

        }
        abort(403, 'Access denied');
    }

    /* Não usado por enquanto...
    public function convenio(Convenio $convenio){
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$convenio->cnpj)) {
            $pdf = PDF::loadView('pdfs.convenio', compact('convenio'));
            return $pdf->download('convenio.pdf');
        }
        abort(403, 'Access denied');
    }
    */
}
