<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['nome_da_empresa','cnpj_da_empresa','area_de_atuacao_da_empresa','endereco_da_empresa','nome_de_contato_da_empresa','email_de_contato_da_empresa','telefone_de_contato_da_empresa','nome_do_representante_da_empresa','cargo_do_representante_da_empresa','nome_do_supervisor_do_estagio','cargo_do_supervisor_do_estagio','telefone_do_supervisor_do_estagio','email_do_supervisor_do_estagio'];
}
