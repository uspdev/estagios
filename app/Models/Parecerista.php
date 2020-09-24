<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parecerista extends Model
{
    use HasFactory;
    protected $fillable = ['numero_usp','presidente'];
}
