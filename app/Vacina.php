<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    protected $fillable = [
        'posto_vacinacao', 'primeiro_nome',  'nome_paciente', 'vacina_realizada', 'informacao_lote', 'data', 'dose'
    ];
}
