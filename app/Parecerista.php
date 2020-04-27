<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parecerista extends Model
{
    protected $fillable = ['numero_usp','nome','acesso_ate'];
}
