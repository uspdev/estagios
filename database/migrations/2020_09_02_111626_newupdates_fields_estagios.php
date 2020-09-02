<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewupdatesFieldsEstagios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estagios', function (Blueprint $table) {
            $table->text('atividades')->nullable()->change();
            $table->text('justificativa')->nullable()->change(); 
            $table->text('atividadesjustificativa')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estagios', function (Blueprint $table) {
            //
        });
    }
}
