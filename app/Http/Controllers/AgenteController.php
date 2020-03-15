<?php

namespace App\Http\Controllers;

use App\Localidade;
use App\Paciente;
use Illuminate\Http\Request;

class AgenteController extends Controller
{
    public function indexcadastraPaciente(){
        $localidade = Localidade::all();
        return view('Agente.cadastroPaciente', [
            'localidades' => $localidade
        ]);
    }
    public function mostraPacienteAgente()
    {
        return view('Agente.mostraPacienteAgente', ['pacientes' => Paciente::with(['localidade'])->get()]);
    }
    public function indexAdmAgente(){
        return view('Agente.AdministracaoAgente');
    }
    public function recadoAgente(){
        return view('Agente.recadosAgente');
    }
}
