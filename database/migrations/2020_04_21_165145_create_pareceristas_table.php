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
            $table->string('numero_usp',20);

            /* 1:  checkbox is ticked (true)
             * 0:  is not ticked (false)*/
            $table->boolean('presidente')->default(0);
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
