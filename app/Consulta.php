<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
      'id_profissional' , 'peso' , 'altura' , 'pressao' , 'localidade' , 'id_paciente',
      'sintomas' , 'observacoes' , 'finalizacao' , 'data',
    ];

    public function profissional(){
        return $this->hasOne(User::class , 'id_profissional' , 'id');
    }
    public function paciente(){
        return $this->hasOne(Paciente::class , 'id_paciente' ,'id');
    }
}
