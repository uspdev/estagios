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
            $table->string('numero_usp');       
            $table->string('valorbolsa');
            $table->string('tipobolsa');
            $table->string('duracao');            
            $table->text('justificativa');                
            $table->string('atividadespertinentes'); 
            $table->string('mediaponderada'); 
            $table->string('horariocompativel'); 
            $table->text('desempenhoacademico'); 
            $table->date('data_inicial');
            $table->date('data_final');
            $table->string('cargahoras'); 
            $table->string('cargaminutos');             
            $table->string('horario');
            $table->string('auxiliotransporte');
            $table->string('especifiquevt'); 
            $table->string('cnpj');            
            $table->text('atividades');
            $table->string('seguradora');
            $table->string('numseguro');  
            $table->text('controlehorario')->nullable();       
            $table->text('supervisao')->nullable();
            $table->text('interacao')->nullable();
            $table->text('enderecoedias')->nullable();
            //
            $table->string('pandemiahomeoffice');
            $table->string('pandemiamedidas')->nullable();                     

            /* Campos da rescição */
            $table->text('rescisao_motivo')->nullable();
            $table->date('rescisao_data')->nullable();

            /* Campos da renovação */
            $table->text('renovacao_justificativa')->nullable();
            $table->bigInteger('renovacao_parent_id')->nullable();

            /* Campos da alteração */
            $table->text('alteracao')->nullable();
            $table->unsignedBigInteger('alteracao_user_id')->nullable();
            $table->foreign('alteracao_user_id')->references('id')->on('users')->onDelete('cascade');

            /* Análises */
            $table->text('analise_tecnica')->nullable();
            $table->unsignedBigInteger('analise_tecnica_user_id')->nullable();
            $table->foreign('analise_tecnica_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->text('analise_academica')->nullable();
            $table->unsignedBigInteger('analise_academica_user_id')->nullable();
            $table->foreign('analise_academica_user_id')->references('id')->on('users')->onDelete('cascade');
            

            $table->text('analise_alteracao')->nullable();
            $table->unsignedBigInteger('analise_alteracao_user_id')->nullable();
            $table->foreign('analise_alteracao_user_id')->references('id')->on('users')->onDelete('cascade');

            /* Campo para controlar workflow */
            $table->string('status');

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
