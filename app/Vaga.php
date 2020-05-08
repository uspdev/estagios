<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $fillable = ['titulo','descricao','expediente','salario','horario','beneficios','divulgar_ate'];

    public function getDivulgarAteAttribute($value) {
        /* No banco está YYYY-MM-DD, mas vamos retornar DD/MM/YYYY */
        return implode('/',array_reverse(explode('-',$value)));
    }

    public function setDivulgarAteAttribute($value) {
        /* Chega no formato DD/MM/YYYY e vamos salvar como YYYY-MM-DD */
       $this->attributes['divulgar_ate'] = implode('-',array_reverse(explode('/',$value)));
    }
}
