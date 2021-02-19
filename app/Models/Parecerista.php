<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Uspdev\Replicado\Pessoa;

class Parecerista extends Model
{
    use HasFactory;
    protected $fillable = ['numero_usp','presidente'];

    public function scopePresidente($query)
    {
        return $query->where('presidente', true)->first();
    }

    public function getNomeAttribute() {
        if($this->numero_usp)
            return Pessoa::nomeCompleto($this->numero_usp);
    }

    public function getEmailAttribute() {
        if($this->numero_usp)
            return Pessoa::email($this->numero_usp);
    }

}
