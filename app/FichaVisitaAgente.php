<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaVisitaAgente extends Model
{
    protected $fillable = [
        'id',  'identificador' , 'id_agente' , 'id_localidade' , 'descricao' , 'problemas' , 'data' ,
    ];

    public function paciente(){
       return $this->hasOne(Paciente::class, 'id', 'identificador');
    }

    public function profissional(){
       return  $this->hasOne(User::class, 'id' , 'id_agente');
    }

    public function localidade()
    {
       return  $this->hasOne(Localidade::class, 'id', 'id_localidade');
    }

}
