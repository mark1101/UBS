<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtestadoMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atestado_medicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_paciente')->unsigned();
            $table->integer('id_localidade')->unsigned();
            $table->integer('id_profissional')->unsigned();
            $table->string('dias');
            $table->string('data');
            $table->integer('id_sede')->default(1);
            $table->timestamps();

            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_localidade')->references('id')->on('localidades');
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
        Schema::dropIfExists('atestado_medicos');
    }
}
