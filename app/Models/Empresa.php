<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function setCnpjAttribute($value) {
        if($value) {
            $this->attributes['cnpj'] = preg_replace('/[^0-9]/', '', $value);
        }
    }

    public function setConcederAcessoCnpjAttribute($value) {
        if($value) {
            $this->attributes['conceder_acesso_cnpj'] = preg_replace('/[^0-9]/', '', $value);
        }
    }

    public function getCnpjNumberAttribute($value) {
        return preg_replace( '/[^0-9]/', '', $this->cnpj );
    }

    public function getCnpjAttribute($value) {
        if($value && strlen($value)==14){
            $value = preg_replace("/[^0-9]/", "", $value);
            $cnpj = substr($value, 0, 2) . '.' . 
                    substr($value, 2, 3) . '.' . 
                    substr($value, 5, 3) . '/' . 
                    substr($value, 8, 4) . '-' . 
                    substr($value, -2);
            return $cnpj;
        }
    }

    public function empresa_com_acesso()
    {
        if(Empresa::where('cnpj',$this->conceder_acesso_cnpj)->first()){
          return $this->belongsTo($this,'conceder_acesso_cnpj','cnpj');
        } return new Empresa;
    }
     
}
