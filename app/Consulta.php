<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
      'id_profissional' , 'peso' , 'altura' , 'pressao' , 'id_localidade' , 'id_paciente',
      'sintomas' , 'observacoes' , 'finalizacao' , 'data', 'id_sede',
    ];

    public function profissional(){
        return $this->hasOne(User::class , 'id' , 'id_profissional');
    }
    public function paciente(){
        return $this->hasOne(Paciente::class , 'id' ,'id_paciente');
    }
    public function localidade(){
        return $this->hasOne(Localidade::class, 'id', 'id_localidade');
    }


}
