<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsRepresentanteOpcionalTableEstagios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estagios', function (Blueprint $table) {
            $table->string('nome_do_representante_opcional')->nullable();
            $table->string('cargo_do_representante_opcional')->nullable(); 
            $table->string('email_do_representante_opcional')->nullable(); 
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
            $table->dropColumn('nome_do_representante_opcional');
            $table->dropColumn('cargo_do_representante_opcional');
            $table->dropColumn('email_do_representante_opcional');
        });
    }
}
