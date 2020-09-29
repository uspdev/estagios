<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewEstagiosFieldsFromEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estagios', function (Blueprint $table) {
            $table->string('nome_do_supervisor_estagio');
            $table->string('cargo_do_supervisor_estagio');
            $table->string('telefone_do_supervisor_estagio');
            $table->string('email_do_supervisor_estagio');
            $table->string('nome_de_contato');
            $table->string('email_de_contato');
            $table->string('telefone_de_contato');
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
            $table->dropColumn('nome_do_supervisor_estagio');
            $table->dropColumn('cargo_do_supervisor_estagio');
            $table->dropColumn('telefone_do_supervisor_estagio');
            $table->dropColumn('email_do_supervisor_estagio');
            $table->dropColumn('nome_de_contato');
            $table->dropColumn('email_de_contato');
            $table->dropColumn('telefone_de_contato');   
        });
    }
}
