<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaTratamento extends Model
{
    protected $fillable = [
      'id' , 'id_paciente' , 'id_profissional' , 'id_localidade' ,
      'data' , 'tratamento_executado' , 'tipo' ,
    ];
}
