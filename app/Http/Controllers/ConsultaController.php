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
        $paciente = Paciente::where('id_localidade' , Auth::user()->localidade)->get();
        return view('Usuario.cadastroConsulta', ['pacientes' => $paciente]);
    }

    public function cadastroConsulta(Request $request)
    {
        $data = $request->all();

        $data['id_localidade'] = Auth::user()->localidade;
        $data['id_profissional'] = Auth::user()->id;
        $data['id_sede'] = Auth::user()->cidade_sede;

        Consulta::create($data);
        return redirect('/consultaCadastro');
    }

    /*public function mostraConsulta()
    {

        $paciente = Paciente::all();
        $consulta = Consulta::all();
        $profissionais = User::all();

        return view('Usuario.mostraConsulta', ['paciente' => $paciente, 'users' => $profissionais,
            'consultas' => Consulta::with(['paciente', 'profissional', 'localidade'])->get()
        ]);
    }*/

    public function buscaConsulta(Request $request)
    {
        try {
            $data = Paciente::where('nome', 'like', '%' . $request->criterio . '%')
                ->get();

            foreach ($data as $item) {
                if (Consulta::where('id_paciente', $item->id)->with(['localidade', 'profissional', 'paciente'])->count() > 0) {
                    $consultasAux[] = Consulta::where('id_paciente', $item->id)->with(['localidade', 'profissional', 'paciente'])->get();
                }
            }

            foreach ($consultasAux as $item) {
                foreach ($item as $consults) {
                    $consultas[] = $consults;
                }

            }

            for ($i = 0; $i < count($consultas); $i++) {

                $consultas[$i]['localidade'] = ($consultas[$i]->localidade)->nome;
                $consultas[$i]['profissional'] = ($consultas[$i]->profissional)->name;
                $consultas[$i]['paciente'] = ($consultas[$i]->paciente)->nome . "" . ($consultas[$i]->paciente)->ultimo_nome;

            }

            $response['data'] = $consultas;
            $response['success'] = true;

            echo json_encode($response);
        } catch (\Exception $e) {

            $response['data'] = "no data";
            $response['success'] = true;

            echo json_encode($response);
        }


    }
}
