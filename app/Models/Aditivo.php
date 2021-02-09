<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estagio;

class Aditivo extends Model
{
    use HasFactory;

    public function estagio()
    {
        return $this->belongsTo(Estagio::class);
    }
}
