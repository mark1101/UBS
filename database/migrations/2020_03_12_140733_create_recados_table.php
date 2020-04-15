<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('origem');
            $table->string('modulo_trabalho');
            $table->integer('destino');
            $table->string('mensagem');
            $table->integer('mandante')->unsigned();
            $table->timestamp('data');

            $table->foreign('destino')->references('id')->on('users');
            $table->foreign('origem')->references('id')->on('localidade');
            $table->foreign('mandante')->references('id')->on('users');

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
        Schema::dropIfExists('recados');
    }
}
