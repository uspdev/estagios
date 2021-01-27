<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAditivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aditivos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // id do estágio
            $table->foreignId('estagio_id')->constrained('estagios');

            // alteracao
            $table->text('alteracao');

            // aprovação do setor de graduação
            $table->boolean('aprovado_graduacao')->nullable();

            // aprovação do parecerista
            $table->boolean('aprovado_parecerista')->nullable();

            // Comentários da graduação
            $table->text('comentario_graduacao')->nullable();

            // Comentários do
            $table->text('comentario_parecerista')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aditivos');
    }
}
