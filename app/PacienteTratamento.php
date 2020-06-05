<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PacienteTratamento extends Model
{
    protected $fillable = [
      'id' , 'id_paciente' , 'tratamento'
    ];

    public function paciente()
    {
        return $this->hasOne(Paciente::class , 'id' , 'id_paciente');
    }
}
