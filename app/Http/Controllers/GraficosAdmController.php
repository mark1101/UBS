<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class GraficosAdmController extends Controller
{
    public function index(){
        $pacientes = Paciente::all();


        $p = count($pacientes);
        return view('Adm.graficos' , [
            'pacientes' => $p
        ]);
    }
}
