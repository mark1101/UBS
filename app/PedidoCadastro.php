<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoCadastro extends Model
{
    protected $fillable = [
      'id' , 'nome_municipio' , 'telefone' , 'email' ,
      'cep' , 'mensagem'
    ];
}
