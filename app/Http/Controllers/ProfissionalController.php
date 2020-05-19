<?php

namespace App\Http\Controllers;

use App\Localidade;
use App\Sede;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfissionalController extends Controller
{
    public function indexProfissional()
    {

        $sedeUser = Auth::user()->cidade_sede;
        $localidade = Localidade::where('id_sede', $sedeUser)->get();


        return view('Adm.cadastroProfissionais', ['localidades' => $localidade]);
    }

    public function cadastroProfissional(Request $request)
    {

        $data = $request->all();

        $response['errors']['cpf'] = "";
        $response['errors']['nascimento'] = "";
        $response['errors']['senha'] = "";
        $response['errors']['email'] = "";

        $date_born = $data['data_nascimento'];
        $date_born = date('Y-m-d', strtotime(str_replace('/', "-", $date_born)));
        $today = date('Y-m-d');

        if ($data['password'] != $data['confirma']) {
            $response['success'] = false;
            $response['errors']['senha'] = "As senhas diferem.";
        } else if (User::where('cpf', $data['cpf'])->count() > 0) {
            $response['success'] = false;
            $response['errors']['cpf'] = "CPF já cadastrado.";
        } else if ($date_born > $today) {
            $response['success'] = false;
            $response['errors']['nascimento'] = "Data inválida.";
        } else if (User::where('email', $data['email'])->count() > 0) {
            $response['success'] = false;
            $response['errors']['email'] = "Email já cadastrado.";
        } else {
            $data['password'] = Hash::make($data['password']);
            $data['controle_acesso'] = 0;
            $data['admin'] = 0;

            if ($data['funcao'] == 'Recepcao') {
                $data['controle_acesso'] = 4;
            } else if ($data['funcao'] == 'Medicina' || $data['funcao'] == 'Enfermagem') {
                $data['controle_acesso'] = 2;
            } else if ($data['funcao'] == 'Odontologia') {
                $data['admin'] = 2;
            } else if ($data['funcao'] == 'Agente de Saúde') {
                $data['admin'] = 3;
            }
            $data['cidade_sede'] = Auth::user()->cidade_sede;
            User::create($data);
            $response['success'] = true;
        }
        echo json_encode($response);
    }

    public function alteraProfissional(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        User::where('id', $id)->update($data);

        $response['success'] = true;
        $response['message'] = "Profissional editado com sucesso!";

        echo json_encode($response);
    }
}
