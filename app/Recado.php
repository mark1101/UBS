<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recado extends Model
{
    protected $fillable = [
      'id' , 'origem', 'modulo_trabalho' , 'destino', 'mensagem' , 'data' ,
    ];

    public function localidade()
    {
        return $this->hasOne(Localidade::class , 'id', 'origem');
    }

    public function destino()
    {
        return $this->hasOne(Localidade::class , 'id', 'destino');
    }
}
