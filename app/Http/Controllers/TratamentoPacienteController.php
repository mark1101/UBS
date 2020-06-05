<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\PacienteTratamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TratamentoPacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::where('id_sede', Auth::user()->cidade_sede)->get();

        return view('Usuario.tratamentoPaciente', [
            'pacientes' => $pacientes
        ]);
    }

    public function cadastro(Request $request)
    {
        $data = $request->all();

        PacienteTratamento::create($data);

        $response['success'] = true;
        echo json_encode($response);

    }
}
