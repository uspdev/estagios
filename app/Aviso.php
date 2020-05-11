<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    protected $fillable = ['titulo','corpo','divulgacao_home_ate'];

}
