<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $guarded = ['id'];

    public function setCnpjAttribute($value) {
        $this->attributes['cnpj'] = preg_replace('/[^0-9]/', '', $value);
     }
}
