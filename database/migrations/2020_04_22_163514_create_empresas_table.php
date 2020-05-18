<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('razao_social');
            $table->string('cnpj')->unique();
            $table->string('area_de_atuacao');
            $table->string('endereco');
            $table->string('cep');
            $table->string('nome_de_contato');
            $table->string('telefone_de_contato');
            $table->string('nome_do_representante');
            $table->string('cargo_do_representante');
            $table->string('nome_do_supervisor_estagio');
            $table->string('cargo_do_supervisor_estagio');
            $table->string('telefone_do_supervisor_estagio');
            $table->string('email_do_supervisor_estagio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
