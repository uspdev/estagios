<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Estagio;
use Uspdev\Replicado\Graduacao;

class AddColumnGraduacaoTableEstagios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estagios', function (Blueprint $table) {
            $table->string('graduacao')->nullable();
        });

        $estagios = Estagio::all();
        foreach($estagios as $estagio) {
            if($estagio->numero_usp) {
                $curso_usp = Graduacao::curso($estagio->numero_usp, 8)['nomhab'];
                if($curso_usp) {
                    $estagio->graduacao =  $curso_usp;
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
            Schema::dropIfExists('graduacao');
        });
    }
}
