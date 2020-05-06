<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaEntrada extends Model
{
    protected $fillable = [
        'id' , 'id_paciente' , 'encaminhamento', 'data' , 'id_localidade'
    ];

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function localidade()
    {
        return $this->hasOne(Localidade::class, 'id', 'id_localidade');
    }

}
