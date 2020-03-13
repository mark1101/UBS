<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacinasTable extends Migration
{

    public function up()
    {
        Schema::create('vacinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_paciente')->unsigned();
            $table->string('localidade');
            $table->string('vacina_realizada');
            $table->string('informacao_lote');
            $table->timestamp('data');
            $table->string('dose');
            $table->timestamps();
        });
        Schema::table('vacinas' , function (Blueprint $table){
           $table->foreign('id_paciente')->references('id')->on('pacientes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vacinas');
    }
}
