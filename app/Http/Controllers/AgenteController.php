<?php

namespace App\Http\Controllers;

use App\Localidade;
use App\Paciente;
use App\Recado;
use App\User;
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
    public function indexBuscaPaciente(){
        return view('Agente.mostraPacienteAgente');
    }
    public function mostraPacienteAgente(Request $request)
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
    public function comunicacaAgente(){
        $users = User::where('localidade', Auth::user()->localidade)->get();
        return view('Agente.comunicacaoAgente',[
           'profissionais' => $users
        ]);
    }
    public function cadastraRecadoAgente(Request $request){
        $data = $request->all();
        $data['origem'] = Auth::user()->localidade;
        $data['mandante'] = Auth::user()->id;
        $data['modulo_trabalho'] = Auth::user()->funcao;

        Recado::create($data);

        $response['success'] = true;

        echo json_encode($response);
    }

}
