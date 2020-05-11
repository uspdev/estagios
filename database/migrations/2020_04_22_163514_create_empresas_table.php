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
            $table->text('nome_da_empresa');
            $table->integer('cnpj')->unique();
            $table->text('area_de_atuacao_da_empresa');
            $table->text('endereco_da_empresa');
            $table->text('nome_de_contato_da_empresa');
            $table->text('email_de_contato_da_empresa');
            $table->text('telefone_de_contato_da_empresa');
            $table->text('nome_do_representante_da_empresa');
            $table->text('cargo_do_representante_da_empresa');
            $table->text('nome_do_supervisor_do_estagio');
            $table->text('cargo_do_supervisor_do_estagio');
            $table->text('telefone_do_supervisor_do_estagio');
            $table->text('email_do_supervisor_do_estagio');

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
