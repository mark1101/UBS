<?php

namespace App\Http\Controllers;

use App\Dentista;
use App\Paciente;
use Illuminate\Http\Request;

class DentistaController extends Controller
{
    public function indexAdm()
    {
        return view('Dentista.administracaoDentista');
    }

    public function indexConsulta()
    {
        $paciente = Paciente::all();
        return view('Dentista.cadastroConsultaOdonto' , [
            'pacientes' , $paciente
        ]);
    }
    public function cadastraDentista(Request $request)
    {
        $data = $request->all();

        Dentista::create($data);
    }
}
