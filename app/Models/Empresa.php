<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function setCnpjAttribute($value) {
        $this->attributes['cnpj'] = preg_replace('/[^0-9]/', '', $value);
     }
}
