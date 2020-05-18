<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uspdev\Replicado\Pessoa;


class IndexController extends Controller
{
    public function index(Request $request){
        /* Se for admin */

        /* Se for parecerista */

        /* Se for empresa com cadastro ir para show.blade.php */

        /* Se for empresa logada, mas sem cadastro, ir create.blade.php */

        /* Usuário deslogado ir para tela de login */
        return view('index');
    }

}