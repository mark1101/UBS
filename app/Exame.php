<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    protected $fillable = ['id', 'comunidade_atendida', 'id_paciente', 'id_profissional', 'nome', 'ultimo_nome', 'nome_exame',
        'resultado', 'local', 'data' , 'documento'];


    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }
}
