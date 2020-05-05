<?php

namespace App\Http\Controllers;

use App\FichaTratamento;
use App\FichaVisitaAgente;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FichaVisitaController extends Controller
{
    public function indexVisita()
    {
        $paciente = Paciente::where('id_localidade', Auth::user()->localidade)->get();

        return view ('Agente.cadastroFicha',[
            'pacientes' => $paciente
        ]);
    }

    public function cadastraFicha(Request $request){
        $data = $request->all();

        $data['id_agente'] = Auth::user()->id;
        $data['id_localidade'] = Auth::user()->localidade;

        FichaVisitaAgente::create($data);

        $response['success'] = true;
        echo json_encode($response);
    }

    public function indexBuscaFicha()
    {
        $fichas = FichaVisitaAgente::all();

        return view('Agente.buscarFichas',[
            'fichas' => $fichas
        ]);
    }

    public function buscaFicha(Request $request){

        $data = $request->all();
        unset($data['_token']);

        $valor = Auth::user()->cidade_sede;


        $data = FichaVisitaAgente::where('identificador', 'like', '%' . $request->criterio . '%')
            ->with(['localidade'])
            ->get();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['localidade'] = ($data[$i]->localidade)->nome;
        }


        $response['success'] = true;
        $response['data'] = $data;

        echo json_encode($response);
    }

    public function alteraFicha(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        FichaVisitaAgente::where('id', $id)->update($data);

        $response['success'] = true;
        $response['message'] = "Ficha editada com sucesso!";

        echo json_encode($response);
    }
}
