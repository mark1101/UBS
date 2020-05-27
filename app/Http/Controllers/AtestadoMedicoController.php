<?php

namespace App\Http\Controllers;

use App\AtestadoMedico;
use App\Paciente;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AtestadoMedicoController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::where('id_sede', Auth::user()->cidade_sede)->get();

        return view('Usuario.atestadoMedico', [
            'pacientes' => $pacientes
        ]);
    }

    public function indexDentista()
    {
        $pacientes = Paciente::where('id_sede', Auth::user()->cidade_sede)->get();

        return view('Dentista.atestadoOdontologico', [
            'pacientes' => $pacientes
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->all();

        $pacientes = Paciente::where('id_localidade', Auth::user()->localidade)->get();

        $data['id_localidade'] = Auth::user()->localidade;
        $data['id_profissional'] = Auth::user()->id;
        $data['id_sede'] = Auth::user()->cidade_sede;

        $response['errors']['date'] = "";

        $date_born = $data['data'];
        $date_born = date('Y-m-d', strtotime(str_replace('/', "-", $date_born)));
        $today = date('Y-m-d');

        if ($date_born < $today) {
            $response['success'] = false;
            $response['errors']['date'] = "Data inválida, é aceito somente datas maiores ou igual a de hoje.";
        } else {
            $response['success'] = true;
            AtestadoMedico::create($data);
        }

        echo json_encode($response);

    }

    public function createPdf()
    {
        $id = AtestadoMedico::where('id', Auth::user()->id)
            ->with(['paciente', 'localidade'])
            ->get();
        $data = [];
        foreach ($id as $item){
            $data = $item;
        }

        if (Auth::user()->funcao == "Odontologia") {
            $pdf = PDF::loadView('Dentista.pdfAtestadoOdonto', compact('data'));
            return $pdf->setPaper('a4')->stream('AtestadoOdontologico.pdf');
        } else {
            $pdf = PDF::loadView('Usuario.pdfAtestadoMedico', compact('data'));
            return $pdf->setPaper('a4')->stream('AtestadoMedico.pdf');
        }
    }
}
