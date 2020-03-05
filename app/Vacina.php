<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    protected $fillable = [
        'posto_vacinacao', 'nome_paciente', 'vacina_realizada', 'informacao_lote', 'data'
    ];
}
