<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultaDentistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_dentistas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paciente')->unsigned();
            $table->integer('id_profissional')->unsigned();
            $table->integer('id_localidade')->unsigned();
            $table->timestamp('inicio_tratamento');
            $table->string('condicoes_higiete');
            $table->string('uso_medicamento');
            $table->string('alergia');
            $table->string('problemas_cardiaco');
            $table->string('diabetes');
            $table->string('outras_doencas');
            $table->string('sensibilidade');
            $table->string('halitose');
            $table->string('mucosa');
            $table->string('lingua');
            $table->string('palato_mole');
            $table->string('assoalho_bucal');
            $table->string('labios');
            $table->string('placa_bacteriana');
            $table->string('sangramento_gengival');
            $table->string('tartaro');
            $table->string('mobilidade_dental');
            $table->string('apinhamento');
            $table->string('diastemas');
            $table->string('observacoes');
            $table->string('plano_tratamento');

            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_profissional')->references('id')->on('users');
            $table->foreign('id_localidade')->references('id')->on('localidades');

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
        Schema::dropIfExists('consulta_dentistas');
    }
}
