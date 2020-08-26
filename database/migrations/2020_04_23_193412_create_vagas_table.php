<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cnpj');
            $table->string('titulo');
            $table->text('descricao');
            $table->text('expediente');
            $table->string('salario');
            $table->string('horario');
            $table->text('beneficios');
            $table->date('divulgar_ate');
            $table->string('divulgacao_autorizada',10)->default('sim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vagas');
    }
}
