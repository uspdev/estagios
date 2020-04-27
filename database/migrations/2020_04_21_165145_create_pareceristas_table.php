<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePareceristasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pareceristas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('numero_usp');
            $table->text('nome');
            $table->date('acesso_ate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pareceristas');
    }
}
