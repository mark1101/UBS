<?php

namespace App\Http\Controllers;

use App\Encaminhamento;
use App\Paciente;
use App\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class EncaminhamentoController extends Controller
{
    public function index()
    {
        $paciente = Paciente::where('id_sede' , Auth::user()->cidade_sede)->get();
        $user = User::all();

        return view('Usuario.encaminhamento', ['pacientes' => $paciente , 'profissionais' => $user]);
    }

    public function cadastroEncaminhamento(Request $request)
    {

        $data = $request->all();
        unset($data["_token"]);

        $data['id_localidade'] = Auth::user()->localidade;
        $data['id_sede'] = Auth::user()->cidade_sede;
        $data['id_profissional'] = Auth::user()->id;
        Encaminhamento::create($data);

        $response['success'] = true;
        echo json_encode($response);

        //return redirect('/encaminhamento');
    }

    public function createPdf()
    {
        $data = Encaminhamento::where('id', Encaminhamento::max('id'))
            ->with(['paciente', 'localidade'])
            ->get();


        $pdf = PDF::loadView('Usuario.pdfEncaminhamento', compact('data'));
        return $pdf->setPaper('a4')->stream('Encaminhamento.pdf');
    }
}
