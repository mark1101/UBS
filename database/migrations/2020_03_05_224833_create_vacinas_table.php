<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('posto_vacinacao');
            $table->string('primeiro_nome');
            $table->string('nome_paciente');
            $table->string('vacina_realizada');
            $table->string('informacao_lote');
            $table->timestamp('data');
            $table->string('dose');
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
        Schema::dropIfExists('vacinas');
    }
}
