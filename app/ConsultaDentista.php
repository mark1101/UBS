<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultaDentista extends Model
{
    protected $fillable = [
        'id', 'id_paciente', 'id_profissional', 'inicio_tratamento',
        'condicoes_higiene', 'uso_medicamento', 'alergia',
        'problema_cardiaco', 'diabetes', 'outras_doencas',
        'sensibilidade', 'halitose', 'mucosa', 'lingua', 'palato_mole',
        'assoalho_bucal', 'labios', 'placa_bacteriana', 'sangramento_gengival',
        'tartaro', 'mobilidade_dental', 'apinhamento', 'diastemas', 'observacoes',
        'plano_tratamento',
    ];
}
