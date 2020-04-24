<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('nome_rep');
            $table->text('cargo_rep');
            $table->text('email_rep');
            $table->text('rg_rep');
            $table->text('cpf_rep');
            $table->text('nome_rep2');
            $table->text('cargo_rep2');
            $table->text('email_rep2');
            $table->text('rg_rep2');
            $table->text('cpf_rep2');
            $table->text('desc');
            $table->text('ativ');
            $table->text('nome_cont');
            $table->text('tel_cont');
            $table->text('email_cont');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convenios');
    }
}
