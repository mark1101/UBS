<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    public function indexConsulta()
    {
        $paciente = Paciente::all();
        return view('Usuario.cadastroConsulta', ['pacientes' => $paciente]);
    }

    public function cadastroConsulta(Request $request)
    {
        $data = $request->all();

        $data['localidade'] = Auth::user()->localidade;
        $data['id_profissional'] = Auth::user()->id;

        Consulta::create($data);

        return redirect('/consultaCadastro');
    }
}
