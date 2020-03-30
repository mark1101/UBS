<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'id', 'nome', 'ultimo_nome', 'data_nascimento', 'idade' , 'email','num_sus', 'cpf', 'id_sede', 'id_localidade', 'telefone'
    ];

    public function localidade(){
        return $this->hasOne(Localidade::class, 'id', 'id_localidade');
    }
    public function sede(){
        return $this->hasOne(Sede::class, 'id', 'id_sede');
    }


}
