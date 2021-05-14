<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estagio;
use OwenIt\Auditing\Contracts\Auditable;

class Aditivo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public function estagio()
    {
        return $this->belongsTo(Estagio::class);
    }
}
