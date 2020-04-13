<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_profissional')->unsigned();
            $table->string('peso');
            $table->string('altura');
            $table->string('pressao');
            $table->integer('id_localidade')->unsigned();
            $table->integer('id_paciente')->unsigned();
            $table->string('sintomas');
            $table->string('observacoes');
            $table->string('finalizacao');
            $table->timestamp('data');
            $table->integer('id_sede')->default(1);
            $table->timestamps();

            $table->foreign('id_profissional')->references('id')->on('users');
            $table->foreign('id_paciente')->references('id')->on('pacientes');
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
        Schema::dropIfExists('consultas');
    }
}
