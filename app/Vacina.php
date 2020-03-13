<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    protected $fillable = [
        'id', 'posto_vacinacao', 'id_paciente', 'localidade', 'vacina_realizada', 'informacao_lote', 'data', 'dose'
    ];

    public function pacientes(){
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

}
