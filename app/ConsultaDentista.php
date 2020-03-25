<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultaDentista extends Model
{
    protected $fillable = [
        'id', 'id_paciente', 'id_profissional', 'id_localidade' ,'inicio_tratamento',
        'condicoes_higiene', 'uso_medicamento', 'alergia',
        'problemas_cardiaco', 'diabete', 'outras_doencas',
        'sensibilidade', 'halitose', 'mucosa', 'lingua', 'palato_mole',
        'assoalho_bucal', 'labios', 'placa_bacteriana', 'sangramento_gengival',
        'tartaro', 'mobilidade_dental', 'apinhamento', 'diastemas', 'observacoes',
        'plano_tratamento',
    ];
    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'id_paciente');
    }
    public function profissional(){
        return $this->hasOne(User::class, 'id', 'id_profissional');
    }
    public function localidade(){
        return $this->hasOne(Localidade::class, 'id', 'id_localidade');
    }
}
