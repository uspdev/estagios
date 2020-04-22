<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uspdev\Replicado\Pessoa;


class IndexController extends Controller
{
    public function index(){
        /*Arthur: https://github.com/uspdev/replicado/issues/212
        criar método que verifica se pessoa é Coord Cursos Grad, exemplo:
        Pessoa::verificaCoordCursosGrad($codpes);
        exemplo que deve retorna true : 3053989
        */
        
        /*
        Gabriela: https://github.com/uspdev/replicado/issues/213
        Criar método que verifica se pessoa tem estágio USP ou não, 
        retorna true ou false
        exemplo que deve retorna true : você mesmo
        */
        dd("index, nada para ver aqui");
    }

}
