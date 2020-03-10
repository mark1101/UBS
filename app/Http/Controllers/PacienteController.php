<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    public function indexPaciente()
    {
        return view('Usuario.paciente');
    }
    public function indexbuscaPaciente(){
        return view('Usuario.buscaPaciente');
    }

    public function cadastraPaciente(Request $request)
    {

        $errors = "";
        $data = $request->all();
        $nome = $data['nome'];
        $data_nascimento = $data['data_nascimento'];
        $idade = $data['idade'];
        $email = $data['email'];
        $num_sus = $data['num_sus'];
        $cpf = $data['cpf'];
        $cidade = $data['cidade'];
        $bairro = $data['bairro'];
        $telefone = $data['telefone'];

        Paciente::create($data);

        return redirect('/paciente');

    }
    public function mostraPaciente(Request $request){

        $pacientes = DB::table('pacientes')->select('nome', 'ultimo_nome' ,'data_nascimento', 'idade', 'email', 'num_sus',
           'cpf',  'cidade', 'bairro', 'telefone')->where('nome' , $request->input('buscaPaciente'))->get();

        return view('Usuario.buscaPaciente', ['pacientes' => $pacientes]);
    }
}
