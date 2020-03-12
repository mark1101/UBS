<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    protected $fillable = [
        'id', 'posto_vacinacao', 'id_paciente', 'vacina_realizada', 'informacao_lote', 'data', 'dose'
    ];
}
