<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_paciente')->unsigned();
            $table->integer('id_localidade')->unsigned();
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('color', 7);
            $table->longText('description')->nullable();

            $table->foreign('id_localidade')->references('id')->on('localidades');
            $table->foreign('id_paciente')->references('id')->on('pacientes');

            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
