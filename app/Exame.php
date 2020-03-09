<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    protected $fillable = ['comunidade_atendida', 'nome', 'ultimo_nome', 'nome_exame',
        'resultado', 'local', 'data'];
}
