<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitacaoExame extends Model
{
    protected $fillable = [
        'id' , 'id_paciente' , 'id_profissional' , 'id_localidade' , 'unidade_solicitada' ,
        'nome_exame' , 'observacao' , 'data'
    ];

    public function profissional()
    {
        return $this->hasOne(User::class, 'id', 'id_profissional');
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }

    public function localidade()
    {
        return $this->hasOne(Localidade::class, 'id', 'id_localidade');
    }
}
