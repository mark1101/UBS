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
        $localidade = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();
        return view('Usuario.cadastraPaciente', [
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
        unset($data['_token']);

        $data['id_sede'] = Auth::user()->cidade_sede;
        //dd($data);
        $date_born = $data['data_nascimento'];
        $date_born = date('Y-m-d', strtotime(str_replace('/', "-", $date_born)));
        $today = date('Y-m-d');

        $response['errors']['date'] = "";
        $response['errors']['email'] = "";
        $response['errors']['sus'] = "";
        $response['errors']['cpf'] = "";

        if ($date_born > $today) {
            $response['success'] = false;
            $response['errors']['date'] = "A data de nascimento precisa ser menor que o dia de hoje.";
        } else if (Paciente::where('email', $data['email'])->count() > 0) {
            $response['success'] = false;
            $response['errors']['email'] = "Email inválido, ja temos cadastrado no sistema.";
        } else if (Paciente::where('num_sus', $data['num_sus'])->count() > 0) {
            $response['success'] = false;
            $response['errors']['sus'] = "Número do SUS inválido, já temos cadastrado no sistema";
        } else if (Paciente::where('cpf', $data['cpf'])->count() > 0) {
            $response['success'] = false;
            $response['errors']['cpf'] = "CPF inválido, ja temos cadastrado no sistema.";
        } else {
            $response['success'] = true;
            Paciente::create($data);
        }

        echo json_encode($response);

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
