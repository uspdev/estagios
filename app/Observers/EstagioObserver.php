<?php

namespace App\Observers;

use App\Models\Estagio;
use Uspdev\Replicado\Pessoa;

class EstagioObserver
{
    public function creating(Estagio $estagio)
    {
        $nome = Pessoa::nomeCompleto($estagio->numero_usp);
        if($nome) $estagio->nome = $nome;
    }

    /**
     * Handle the Estagio "created" event.
     *
     * @param  \App\Models\Estagio  $estagio
     * @return void
     */
    public function created(Estagio $estagio)
    {
        //
    }

    /**
     * Handle the Estagio "updated" event.
     *
     * @param  \App\Models\Estagio  $estagio
     * @return void
     */
    public function updated(Estagio $estagio)
    {
        //
    }

    /**
     * Handle the Estagio "deleted" event.
     *
     * @param  \App\Models\Estagio  $estagio
     * @return void
     */
    public function deleted(Estagio $estagio)
    {
        //
    }

    /**
     * Handle the Estagio "restored" event.
     *
     * @param  \App\Models\Estagio  $estagio
     * @return void
     */
    public function restored(Estagio $estagio)
    {
        //
    }

    /**
     * Handle the Estagio "force deleted" event.
     *
     * @param  \App\Models\Estagio  $estagio
     * @return void
     */
    public function forceDeleted(Estagio $estagio)
    {
        //
    }
}
