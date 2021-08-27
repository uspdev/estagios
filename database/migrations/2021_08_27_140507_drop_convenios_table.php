<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('convenios');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cnpj');
            $table->text('nome_representante');
            $table->string('cargo_representante');
            $table->text('email_representante');
            $table->string('rg_representante');
            $table->string('cpf_representante');
            $table->text('nome_representante2');
            $table->string('cargo_representante2');
            $table->text('email_representante2');
            $table->string('rg_representante2');
            $table->string('cpf_representante2');
            $table->text('descricao');
            $table->text('atividade');
            $table->text('nome_contato');
            $table->string('tel_contato');
            $table->text('email_contato');
        });
    }
}
