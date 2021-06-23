<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

# importação dos nomes
use Uspdev\Replicado\Pessoa;
use App\Models\Estagio;

class AddColumnNomeEstagios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estagios', function (Blueprint $table) {
            $table->string('nome')->nullable();
        });
        # migração dos nomes
        $estagios = Estagio::all();
        foreach($estagios as $estagio) {
            if($estagio->numero_usp) {
                $nome_usp = Pessoa::nomeCompleto($estagio->numero_usp);
                if($nome_usp) {
                    $estagio->nome =  $nome_usp;
                    $estagio->save();
                }
                 
            }
        }
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
