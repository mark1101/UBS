<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viagens extends Model
{
    protected $fillable = [
        'id' ,'num_pacientes', 'id_origem' , 'destino' , 'id_motorista' ,
        'id_carro', 'data', 'observacao', 'ativo' ,'id_sede'
        ];

    public function motorista()
    {
        return $this->hasOne(Motorista::class, 'id', 'id_motorista');
    }
    public function carro()
    {
        return $this->hasOne(Carro::class, 'id', 'id_carro');
    }
    public function localidadeOrigem(){
        return $this->hasOne(Localidade::class, 'id', 'id_origem');
    }

}
