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
            $pdf = PDF::loadView('pdfs.termo', compact('estagio'));
            return $pdf->download('termo.pdf');
        }
        abort(403, 'Access denied');
    }

    public function convenio(Convenio $convenio){
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$convenio->cnpj)) {
            $pdf = PDF::loadView('pdfs.convenio', compact('convenio'));
            return $pdf->download('convenio.pdf');
        }
        abort(403, 'Access denied');
    }
    
    public function rescisao(Estagio $estagio){
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$estagio->cnpj)) {

            $empresa = Empresa::where('cnpj',$estagio->cnpj)->first();
            // Formata CNPJ
            $empresa->cnpj =  substr($empresa->cnpj, 0, 2) . '.' . substr($empresa->cnpj, 2, 3) . '.' . substr($empresa->cnpj, 5, 3) . '/' . substr($empresa->cnpj, 8, 4) . '-' . substr($empresa->cnpj, 12, 2);

            // Busca presidente
            $presidente = Parecerista::where('presidente', true)->first();

            $endereco = Pessoa::obterEndereco($estagio->numero_usp);
            // Formata endereço
            $endereco = [
                $endereco['nomtiplgr'],
                $endereco['epflgr'] . ",",
                $endereco['numlgr'] . " ",
                $endereco['cpllgr'] . " - ",
                $endereco['nombro'] . " - ",
                $endereco['cidloc'] . " - ",
                $endereco['sglest'] . " - ",
                "CEP: " . $endereco['codendptl'],
            ];

            $pdf = PDF::loadView('pdfs.rescisao', compact('estagio','empresa','presidente','endereco'));
            return $pdf->download('rescisao.pdf');
        }
        abort(403, 'Access denied');
    }

    public function aditivo(Estagio $estagio){
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$estagio->cnpj)) {
            $pdf = PDF::loadView('pdfs.aditivo', compact('estagio'));
            return $pdf->download('aditivo.pdf');
        }
        abort(403, 'Access denied');
    }

    public function renovacao(Estagio $estagio){
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$estagio->cnpj)) {
            $pdf = PDF::loadView('pdfs.renovacao', compact('estagio'));
            return $pdf->download('renovacao.pdf');
        }
        abort(403, 'Access denied');
    }

    public function parecer(Estagio $estagio){
        if (Gate::allows('admin') | Gate::allows('parecerista') ) {
            if($estagio->numparecerista){
                $pdf = PDF::loadView('pdfs.parecer', compact('estagio'));
                return $pdf->download('parecer.pdf');
            } else {
                request()->session()->flash('alert-danger','PDF não foi gerado! Informe o parecerista!');
                return redirect("/estagios/{$estagio->id}") ;
            }

        }
        abort(403, 'Access denied');
    }

}
