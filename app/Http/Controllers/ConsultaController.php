<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Paciente;
use App\User;
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

        $data['id_localidade'] = Auth::user()->localidade;
        $data['id_profissional'] = Auth::user()->id;

        Consulta::create($data);
        return redirect('/consultaCadastro');
    }

    public function mostraConsulta()
    {

        $paciente = Paciente::all();
        $consulta = Consulta::all();
        $profissionais = User::all();

        return view('Usuario.mostraConsulta', ['paciente' => $paciente, 'users' => $profissionais,
            'consultas' => Consulta::with(['paciente', 'profissional', 'localidade'])->get()
        ]);
    }

    public function buscaConsulta(Request $request)
    {

        $data = Paciente::where('nome', 'like', '%' . $request->criterio . '%')
            ->with(['localidade' , 'profissional' , 'paciente'])
            ->get();

        for ($i = 0; $i < count($data); $i++){
            $data[$i]['localidade'] = ($data[$i]->localidade)->nome;
        }
        for ($i = 0; $i < count($data); $i++){
            $data[$i]['profissional'] = ($data[$i]->profissional)->name;
        }
        for ($i = 0; $i < count($data); $i++){
            $data[$i]['paciente'] = ($data[$i]->paciente)->nome + ($data[$i]->paciente)->ultimo_nome;
        }

        $response['success'] = true;
        $response['data'] = $data;

        echo json_encode($response);
    }
}
