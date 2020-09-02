<?php

namespace App\Http\Controllers;

use PDF;
use App\Estagio;
use App\Empresa;
use App\Convenio;
use App\Parecerista;
use Carbon\Carbon;
use App\User;

use Uspdev\Replicado\Pessoa;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Gate;

class PDFsController extends Controller
{

    public function termo(Estagio $estagio){
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

            $pdf = PDF::loadView('pdfs.termo', compact('estagio','empresa','presidente','endereco'));
            return $pdf->download('termo.pdf');
        }
        abort(403, 'Access denied');
    }

    public function convenio(Convenio $convenio){
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$estagio->cnpj)) {
            $now = Carbon::now();
            $empresa = Empresa::where('cnpj',$convenio->cnpj)->first();
            $pdf = PDF::loadView('pdfs.convenio', compact('convenio', 'empresa', 'now'));
            return $pdf->download('convenio.pdf');
        }
        abort(403, 'Access denied');
    }
    
    public function rescisao(Estagio $estagio, Empresa $empresa){
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$estagio->cnpj)) {
            $now = Carbon::now();
            $pdf = PDF::loadView('pdfs.rescisao', compact('estagio', 'empresa', 'now'));
            return $pdf->download('rescisao.pdf');
        }
        abort(403, 'Access denied');
    }

    public function aditivo(Empresa $empresa){
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$estagio->cnpj)) {
            $now = Carbon::now();
            $pdf = PDF::loadView('pdfs.aditivo', compact('empresa', 'now'));
            return $pdf->download('aditivo.pdf');
        }
        abort(403, 'Access denied');
    }

    public function renovacao(Estagio $estagio){
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

            $pdf = PDF::loadView('pdfs.renovacao', compact('estagio','empresa','presidente','endereco'));
            return $pdf->download('renovacao.pdf');
        }
        abort(403, 'Access denied');
    }

    public function parecer(Estagio $estagio){
        if (Gate::allows('admin') | Gate::allows('parecerista') | Gate::allows('empresa',$estagio->cnpj)) {

            $empresa = Empresa::where('cnpj',$estagio->cnpj)->first();

            $parecerista = User::find($estagio->analise_academica_user_id)->name;
            $pareceristanum = User::find($estagio->analise_academica_user_id)->codpes;

            $pdf = PDF::loadView('pdfs.parecer', compact('estagio','empresa','parecerista','pareceristanum'));
            return $pdf->download('parecer.pdf');
        }
        abort(403, 'Access denied');
    }

}
