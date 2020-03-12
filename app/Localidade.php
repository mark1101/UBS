<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    protected $fillable = [
        'id' , 'id_sede' , 'nome',
    ];
}
