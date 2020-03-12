<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viagens extends Model
{
    protected $fillable = [
        'id' ,'num_pacientes', 'origem' , 'destino' , 'id_motorista' ,
        'id_carro', 'data', 'observacao',
        ];

    public function motorista()
    {
        return $this->hasOne(User::class, 'id', 'id_motorista');
    }
    public function carro()
    {
        return $this->hasOne(Carro::class, 'id', 'id_carro');
    }

}
