<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motoristas extends Model
{
    protected $fillable = [
        'id' , 'nome', 'localidade', 'cpf' , 'data_nascimento', 'telefone',
    ];
}
