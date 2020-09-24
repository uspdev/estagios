<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
  use HasFactory;
 	protected $guarded = ["id"];

 	public function setCpfRepresentanteAttribute($value){
      $this->attributes['cpf_representante'] = preg_replace("/[^0-9]/", "", $value);
    }

   public function setCpfRepresentante2Attribute($value){
      $this->attributes['cpf_representante2'] = preg_replace("/[^0-9]/", "", $value);  
    }

    public function setCnpjAttribute($value){
      $this->attributes['cnpj'] = preg_replace("/[^0-9]/", "", $value);  
    }
}
