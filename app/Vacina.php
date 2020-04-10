<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    protected $fillable = [
        'id', 'id_paciente', 'id_profissional', 'id_localidade', 'vacina_realizada',
        'informacao_lote', 'data', 'dose', 'id_sede',
    ];

    public function paciente(){
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function profissional(){
        return $this->hasOne(User::class, 'id', 'id_profissional');
    }
    public function localidade(){
        return $this->hasOne(Localidade::class, 'id', 'id_localidade');
    }

}
