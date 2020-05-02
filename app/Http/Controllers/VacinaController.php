<?php

namespace App\Http\Controllers;

use App\Localidade;
use App\Paciente;
use App\Vacina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VacinaController extends Controller
{
    public function index()
    {
        $paciente = Paciente::where('id_localidade', Auth::user()->localidade)->get();

        return view('Usuario.cadastroVacina', [
            'pacientes' => $paciente
        ]);
    }

    public function cadastraVacina(Request $request)
    {

        $data = $request->all();

        $data['id_localidade'] = Auth::user()->localidade;
        $data['id_profissional'] = Auth::user()->id;
        $data['id_sede'] = Auth::user()->cidade_sede;

        Vacina::create($data);

        $response['success'] = true;
        echo json_encode($response);

        //return redirect('/vacina');
    }

    public function searchVacina(Request $request)
    {
        $dataa = $request->all();
        unset($dataa['_token']);


        try {
            $data = Paciente::where('nome', 'like', '%' . $request->criterio . '%')
                ->get();
            foreach ($data as $item) {
                if (Vacina::where('id_paciente', $item->id)->with(['localidade', 'paciente'])->count() > 0) {
                    $vacinasAux[] = Vacina::where('id_paciente', $item->id)->orderBy('id_paciente')->with(['localidade', 'paciente'])
                        ->get();
                }
            }
            foreach ($vacinasAux as $item) {
                foreach ($item as $v) {
                    $vacinas[] = $v;
                }

            }
            for ($i = 0; $i < count($vacinas); $i++) {

                $vacinas[$i]['localidade'] = ($vacinas[$i]->localidade)->nome;
                $vacinas[$i]['profissional'] = ($vacinas[$i]->profissional)->name;
                $vacinas[$i]['paciente'] = ($vacinas[$i]->paciente)->nome . "" . ($vacinas[$i]->paciente)->ultimo_nome;

            }

            $response['data'] = $vacinas;
            $response['success'] = true;

            echo json_encode($response);

        } catch (\Exception $e) {

            $response['data'] = "no data";
            $response['success'] = true;

            echo json_encode($response);
        }


    }
}
