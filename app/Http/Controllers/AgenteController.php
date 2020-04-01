<?php

namespace App\Http\Controllers;

use App\Localidade;
use App\Paciente;
use App\Recado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgenteController extends Controller
{
    // SELECT ID FROM nomeTabela ORDER BY ID DESC LIMIT 1

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

        $recado = Recado::where('destino' , Auth::user()->id)->get();

        return view('Agente.recadosAgente' , [
            'rs' => $recado,
            'recados' => Recado::with(['localidade'])->get()
        ]);
    }
}
