<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encaminhamento extends Model
{
    protected $fillable = [
        'id', 'id_profissional', 'id_paciente', 'id_localidade',
        'especialidade_encaminhamento', 'objetivo', 'observacao', 'data' ,
    ];

    public function profissional()
    {
        return $this->hasOne(User::class, 'id', 'id_profissional');
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function localidade()
    {
        return $this->hasOne(Localidade::class, 'id', 'id_localidade');
    }
}
