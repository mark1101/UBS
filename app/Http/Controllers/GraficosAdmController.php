<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class GraficosAdmController extends Controller
{
    public function index(){
        $pacientes = Paciente::all();
        return view('Adm.graficos' , [
            'pacientes' => count($pacientes)
        ]);
    }
}
