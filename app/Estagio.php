<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ZeroDaHero\LaravelWorkflow\Traits\WorkflowTrait;

class Estagio extends Model
{
    use WorkflowTrait;

    protected $guarded = ['id'];

    public function especifiquevtOptions(){
        return [
            'Mensal',
            'Diário'
        ];
    }

    public function tipobolsaOptions(){
        return [
            'Mensal',
            'Por Hora'
        ];
    }
    
    public function getDataInicialAttribute($value) {
        return implode('/',array_reverse(explode('-',$value)));
    }

    public function setDataInicialAttribute($value) {
       $this->attributes['data_inicial'] = implode('-',array_reverse(explode('/',$value)));
    }

    public function getDataFnicialAttribute($value) {
        return implode('/',array_reverse(explode('-',$value)));
    }

    public function setDataFnicialAttribute($value) {
       $this->attributes['data_final'] = implode('-',array_reverse(explode('/',$value)));
    }
}
