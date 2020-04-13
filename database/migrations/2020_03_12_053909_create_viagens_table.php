<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viagens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_motorista')->unsigned();
            $table->integer('num_pacientes');
            $table->integer('id_origem')->unsigned();
            $table->integer('id_destino')->unsigned();
            $table->timestamp('data');
            $table->integer('id_carro')->unsigned();
            $table->string('observacao');
            $table->integer('ativo')->default(0);
            $table->timestamps();

            $table->foreign('id_motorista')->references('id')->on('users');
            $table->foreign('id_origem')->references('id')->on('localidades');
            $table->foreign('id_destino')->references('id')->on('localidades');
            $table->foreign('id_carro')->references('id')->on('carros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viagens');
    }
}
