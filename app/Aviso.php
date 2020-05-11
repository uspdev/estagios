<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{

    protected $guarded = ['id'];

    public function getDivulgacaoHomeAteAttribute($value) {
        /* No banco está YYYY-MM-DD, mas vamos retornar DD/MM/YYYY */
        return implode('/',array_reverse(explode('-',$value)));
    }
    
    public function setDivulgacaoHomeAteAttribute($value) {
        /* Chega no formato DD/MM/YYYY e vamos salvar como YYYY-MM-DD */
        $this->attributes['divulgacao_home_ate'] = implode('-',array_reverse(explode('/',$value)));
    }

}
