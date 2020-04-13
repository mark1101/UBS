<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncaminhamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encaminhamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_profissional')->unsigned();
            $table->integer('id_paciente')->unsigned();
            $table->integer('id_localidade')->unsigned();
            $table->string('especialidade_encaminhamento');
            $table->string('observacao');
            $table->string('objetivo');
            $table->string('data');
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
        Schema::dropIfExists('encaminhamentos');
    }
}
