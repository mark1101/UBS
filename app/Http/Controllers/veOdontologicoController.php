<?php

namespace App\Http\Controllers;

use App\ConsultaDentista;
use App\FichaTratamento;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class veOdontologicoController extends Controller
{
    public function index()
    {
        $dentistas = User::where('funcao', 'like', '%' . 'Odontologia' . '%')
            ->where('cidade_sede', Auth::user()->cidade_sede)
            ->count();

        $dentistasAll = User::where('funcao', 'like', '%'.'Odontologia'. '%')
            ->where('cidade_sede', Auth::user()->cidade_sede)
            ->get();

        $consultasAll = ConsultaDentista::where('id_sede' , Auth::user()->cidade_sede)->get();
        $tratamentosAll = FichaTratamento::where('id_sede', Auth::user()->cidade_sede)->get();

        $consulta = ConsultaDentista::where('id_sede', Auth::user()->cidade_sede)->count();
        $tratamento = FichaTratamento::where('id_sede', Auth::user()->cidade_sede)->count();

        $total = $consulta + $tratamento;

        return view('Adm.veOdontologico', [
            'dentistas' => $dentistas,
            'pacientes_atendidos' => $total,
            'consultas' => $consulta,
            'tratamentos' => $tratamento,
            'dentistasAll' => $dentistasAll,
            'consultasAll' => $consultasAll,
            'tratamentosAll' => $tratamentosAll
        ]);
    }
}
