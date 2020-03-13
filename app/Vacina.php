<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    protected $fillable = [
        'id', 'id_paciente', 'localidade', 'vacina_realizada', 'informacao_lote', 'data', 'dose'
    ];

    public function paciente(){
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

}
