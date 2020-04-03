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
        $pacientes = Paciente::where('id_localidade' , Auth::user()->localidade)->get();

        return view('Usuario.atestadoMedico' ,[
            'pacientes' => $pacientes
        ]);
    }
    public function create(Request $request){
        $data = $request->all();

        $pacientes = Paciente::where('id_localidade' , Auth::user()->localidade)->get();

        $data['id_localidade'] = Auth::user()->localidade;
        $data['id_profissional'] = Auth::user()->id;

        AtestadoMedico::create($data);

        return redirect('/solicitaAtestado');

    }

    public function createPdf()
    {
        $data = AtestadoMedico::where('id', AtestadoMedico::max('id'))
            ->where('id_profissional', Auth::user()->id)
            ->with(['paciente', 'localidade'])
            ->get();


        $pdf = PDF::loadView('Usuario.pdfAtestadoMedico', compact('data'));
        return $pdf->setPaper('a4')->stream('AtestadoMedico.pdf');

    }
}
