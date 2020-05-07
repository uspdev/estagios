<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ZeroDaHero\LaravelWorkflow\Traits\WorkflowTrait;

class Estagio extends Model
{
    use WorkflowTrait;
    protected $fillable = ['numero_usp','valorbolsa','tipobolsa','duracao','justificativa','data_inicial','data_final','cargahoras','cargaminutos','horario','auxiliotransporte','especifiquevt','cnpj','atividades','seguradora','numseguro','controlehorario','supervisao','interacao','enderecoedias'];
}
