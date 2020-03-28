<?php

namespace App\Http\Controllers;

use App\Localidade;
use Illuminate\Http\Request;
use App\Paciente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    public function indexPaciente()
    {
        $localidade = Localidade::all();
        return view('Usuario.paciente', [
            'localidades' => $localidade
        ]);
    }

    public function indexbuscaPaciente(Request $request)
    {
        dd($request->all());

        Paciente::with(['localidade'])->get();
        return view('Usuario.buscaPaciente');
    }

    public function cadastraPaciente(Request $request)
    {
        $errors = "";
        $data = $request->all();
        Paciente::create($data);

        if (Auth::user()->admin == 3) {
            return redirect('/agente/cadastroPaciente');
        } else {
            return redirect('/paciente');
        }
    }

    public function mostraPaciente()
    {
        return view('Usuario.buscaPaciente', ['pacientes' => Paciente::with(['localidade'])->get()]);
    }

    public function buscaPaciente(Request $request)
    {
        $data = Paciente::where('nome', 'like', '%' . $request->criterio . '%')
            ->orWhere('cpf' , 'like' , '%' . $request->criterio . '%')
            ->orWhere('num_sus' , 'like' , '%'. $request->criterio . '%')
            ->orWhere('ultimo_nome' , 'like', '%' . $request->criterio . '%')
            ->get();

        return view('Usuario.buscaPaciente' , ['pacientes' => Paciente::with(['localidade'])->get(),
            'pacientes' => $data]);
    }
}
