<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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
            $table->string('cidade');
            $table->string('bairro');
            $table->string('telefone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paciente');
    }
}
