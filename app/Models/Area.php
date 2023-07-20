<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estagio;

class Area extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function estagio()
    {
        return $this->belongsTo(App\Models\Estagio);
    }
}

