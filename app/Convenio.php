<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
 	protected $fillable = ['nome_representante', 'cargo_representante','email_representante', 'rg_representante','cpf_representante','nome_representante2','cargo_representante2','email_representante2','rg_representante2','cpf_representante2','descricao','atividade','nome_contato','tel_contato','email_contato'];

}
