<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
 	protected $guarded = ["id"];

 	public function setCpfRepresentanteAttribute($value){

      $this->attributes['cpf_representante'] = preg_replace("/[^0-9]/", "", $value);
        
        }

   public function setCpfRepresentante2Attribute($value){

      $this->attributes['cpf_representante2'] = preg_replace("/[^0-9]/", "", $value);
        
        }
}
