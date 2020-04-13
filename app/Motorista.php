<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    protected $fillable = [
        'id' , 'nome' , 'cpf' , 'telefone' , 'id_localidade', 'id_sede'
    ];

    public function localidade(){
        return $this->hasOne(Localidade::class, 'id', 'id_localidade');
    }
}
