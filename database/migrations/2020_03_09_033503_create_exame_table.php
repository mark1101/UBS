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
            $table->bigIncrements('idExame');
            $table->string('comunidade_atendida');
            $table->string('nome');
            $table->string('ultimo_nome');
            $table->string('nome_exame');
            $table->string('resultado');
            $table->string('local');
            $table->string('data');

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
        Schema::dropIfExists('exame');
    }
}
