<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recado extends Model
{
    protected $fillable = [
      'id' , 'origem' , 'mensagem' , 'data' ,
    ];
}
