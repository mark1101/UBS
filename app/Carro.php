<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
       'id' , 'nome' , 'id_localidade' , 'placa' , 'id_sede',
    ];

    public function localidade()
    {
        return $this->hasOne(Localidade::class, 'id', 'id_localidade');
    }

}
