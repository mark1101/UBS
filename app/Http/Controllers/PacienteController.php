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
        $localidade = Localidade::where('id_sede' , Auth::user()->cidade_sede)->get();
        return view('Usuario.paciente', [
            'localidades' => $localidade
        ]);
    }

    public function indexbuscaPaciente(Request $request)
    {

        Paciente::with(['localidade'])->get();
        return view('Usuario.buscaPaciente');
    }

    public function cadastraPaciente(Request $request)
    {
        $errors = "";
        $data = $request->all();

        $data['id_sede'] = Auth::user()->cidade_sede;

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
        $data = $request->all();
        unset($data['_token']);

        $valor = Auth::user()->cidade_sede;


        $data = Paciente::where('nome', 'like', '%' . $request->criterio . '%')
            ->orWhere('cpf', 'like', '%' . $request->criterio . '%')
            ->orWhere('num_sus', 'like', '%' . $request->criterio . '%')
            ->orWhere('ultimo_nome', 'like', '%' . $request->criterio . '%')
            ->with(['localidade'])
            ->get();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['localidade'] = ($data[$i]->localidade)->nome;
        }


        $response['success'] = true;
        $response['data'] = $data;

        echo json_encode($response);
    }

    public function puxaPaciente($id)
    {

        $data = Paciente::where('id', $id)->get();
        if (count($data) == 0) {
            $response['sucess'] = true;
            $response['message'] = "Nenhum usuário encontrado com essas identificações.";

            echo json_encode($response);
        } else {
            $response['sucess'] = true;
            $response['data'] = $data;

            echo json_encode($response);
        }
    }

    public function editaPaciente(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        Paciente::where('id', $id)->update($data);

        $response['success'] = true;
        $response['message'] = "Paciente editado com sucesso!";

        echo json_encode($response);
    }
}
