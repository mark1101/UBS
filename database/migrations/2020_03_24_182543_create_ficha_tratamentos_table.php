<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaTratamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_tratamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_paciente')->unsigned();
            $table->integer('id_profissional')->unsigned();
            $table->integer('id_localidade')->unsigned();
            $table->integer('id_sede');
            $table->string('data');
            $table->string('tratamento_executado');
            $table->string('tipo');
            $table->timestamps();

            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_profissional')->references('id')->on('users');
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
        Schema::dropIfExists('ficha_tratamentos');
    }
}
