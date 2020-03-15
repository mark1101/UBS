<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viagens extends Model
{
    protected $fillable = [
        'id' ,'num_pacientes', 'id_origem' , 'id_destino' , 'id_motorista' ,
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
    public function localidadeOrigem(){
        return $this->hasOne(Localidade::class, 'id', 'id_origem');
    }
    public function localidadeDestino(){
        return $this->hasOne(Localidade::class, 'id', 'id_destino');
    }

}
