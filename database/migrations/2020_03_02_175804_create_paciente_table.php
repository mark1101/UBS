<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteTable extends Migration
{
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nome');
            $table->string('ultimo_nome');
            $table->string('data_nascimento');
            $table->string('idade');
            $table->string('email');
            $table->string('num_sus');
            $table->string('cpf', 16)->unique();
            $table->integer('id_localidade')->unsigned();
            $table->integer('id_sede')->unsigned();
            $table->string('telefone');
            $table->timestamps();

            $table->foreign('id_localidade')->references('id')->on('localidades');
            $table->foreign('id_sede')->references('id')->on('sedes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('paciente');
    }
}
