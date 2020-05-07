<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estagio;
use Workflow;


class TesteController extends Controller
{
    public function teste(){
        $estagio = Estagio::find(1);
        foreach ($estagio->workflow_transitions() as $transition) {
            echo $transition->getName();
        }
        dd( 'ok' );
    }
}
