<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
 	protected $fillable = ['nome_rep', 'cargo_rep','email_rep', 'rg_rep','cpf_rep','nome_rep2','cargo_rep2','email_rep2','rg_rep2','cpf_rep2','desc','ativ','nome_cont','tel_cont','email_cont'];

}
