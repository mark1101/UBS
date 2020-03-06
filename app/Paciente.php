<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'nome', 'data_nascimento', 'idade' , 'email','num_sus', 'cpf', 'cidade', 'bairro', 'telefone'
    ];
}
