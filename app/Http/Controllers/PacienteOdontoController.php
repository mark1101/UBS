<?php

namespace App\Http\Controllers;

use App\ConsultaDentista;
use App\FichaTratamento;
use App\Paciente;
use Illuminate\Http\Request;

class PacienteOdontoController extends Controller
{
    public function mostraPacienteOdonto()
    {
        $consultas = ConsultaDentista::all();

        return view('Dentista.buscaPacienteOdonto', [
            'pacientes' => Paciente::with(['localidade'])->get()]);
    }

    public function buscaPacienteOdonto(Request $request)
    {

        $con = ConsultaDentista::all();
        foreach ($con as $consultas) {
            $consulta = $consultas;
        }
        $tra = FichaTratamento::all();
        foreach ($tra as $tratamentos) {
            $tratamento = $tratamentos;
        }


        $data = Paciente::where('nome', 'like', '%' . $request->criterio . '%')
            ->orwhere('id', 'like', '%' . $consulta->id_paciente . '%')
            ->orWhere('id', 'like', '%' . $tratamento->id_paciente . '%')
            ->with(['localidade'])
            ->get();


        if (count($data) > 0) {
            for ($i = 0; $i < count($data); $i++) {
                $data[$i]['localidade'] = ($data[$i]->localidade)->nome;
            }


            $response['success'] = true;
            $response['data'] = $data;

            echo json_encode($response);
        }else{

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

    }
}
