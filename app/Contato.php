<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = [
      'id' , 'nome' , 'telefone' , 'email' , 'mensagem'
    ];
}
