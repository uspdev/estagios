<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstagiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estagios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('valorbolsa');
            $table->text('tipobolsa');
            $table->text('justificativa');    
            $table->text('dataini');
            $table->text('datafin');
            $table->text('cargahoras'); 
            $table->text('cargaminutos');             
            $table->text('horario');
            $table->text('auxtrans');
            $table->text('especifiquevt'); 
            $table->text('atividades');
            $table->text('seguradora');
            $table->text('numseguro');                                                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estagios');
    }
}
