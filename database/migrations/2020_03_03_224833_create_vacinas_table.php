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
            $table->integer('id_profissional')->nullable()->unsigned();
            $table->integer('id_localidade')->unsigned();
            $table->string('vacina_realizada');
            $table->string('informacao_lote');
            $table->timestamp('data');
            $table->string('dose');
            $table->integer('id_sede')->default(1);
            $table->timestamps();
        });
        Schema::table('vacinas' , function (Blueprint $table){
           $table->foreign('id_paciente')->references('id')->on('pacientes');
           $table->foreign('id_profissional')->references('id')->on('users');
           $table->foreign('id_localidade')->references('id')->on('localidades');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vacinas');
    }
}
