<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viagens extends Model
{
    protected $fillable = [
        'id' , 'origem' , 'destino' , 'id_motorista' ,
        'veiculo' , 'num_passageiros' , 'data', 'observacao',
        ];
}
