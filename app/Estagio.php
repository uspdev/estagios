<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estagio extends Model
{
    protected $fillable = ['numero_usp','valorbolsa','tipobolsa','duracao','justificativa','data_inicial','data_final','cargahoras','cargaminutos','horario','auxiliotransporte','especifiquevt','cnpj','atividades','seguradora','numseguro','controlehorario','supervisao','interacao','enderecoedias'];
}
