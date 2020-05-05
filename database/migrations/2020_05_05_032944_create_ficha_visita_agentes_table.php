<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaVisitaAgentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_visita_agentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identificador');
            $table->integer('id_agente')->unsigned();
            $table->string('descricao');
            $table->string('problemas')->default("nada");
            $table->integer('id_localidade')->unsigned();
            $table->string('data');
            $table->timestamps();

            $table->foreign('id_agente')->references('id')->on('users');
            $table->foreign('id_localidade')->references('id')->on('localidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_visita_agentes');
    }
}
