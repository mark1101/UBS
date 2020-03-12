<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
       'id' , 'nome' , 'localidade'
    ];

    public function localidade()
    {
        return $this->hasOne(Localidade::class, 'id', 'localidade');
    }

}
