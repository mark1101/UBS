<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    public function index()
    {
        return view('paciente');
    }

    public function cadastraPaciente(Request $request)
    {

        $errors = "";
        $data = $request->all();
        $nome = $data['nome'];
        $data_nascimento = $data['data_nascimento'];
        $email = $data['email'];
        $num_sus = $data['num_sus'];
        $cpf = $data['cpf'];
        $cidade = $data['cidade'];
        $bairro = $data['bairro'];
        $telefone = $data['telefone'];

        Paciente::create($data);

        return redirect('/paciente');

    }
}
