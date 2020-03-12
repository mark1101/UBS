<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exames', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('comunidade_atendida');
            $table->string('nome_exame');
            $table->integer('id_paciente')->unsigned();
            $table->integer('id_profissional')->unsigned();
            $table->string('resultado');
            $table->string('local');
            $table->string('data');

            $table->timestamps();
        });
        Schema::table('exames', function (Blueprint $table){
           $table->foreign('id_paciente')->references('id')->on('pacientes');
           $table->foreign('id_profissional')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exame');
    }
}
