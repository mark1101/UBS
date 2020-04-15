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
            ->orderBy('name')
            ->get();

        $consultasAll = ConsultaDentista::where('id_sede' , Auth::user()->cidade_sede)->orderBy('created_at')->get();
        $tratamentosAll = FichaTratamento::where('id_sede', Auth::user()->cidade_sede)->orderBy('created_at')->get();

        $consulta = ConsultaDentista::where('id_sede', Auth::user()->cidade_sede)->count();
        $tratamento = FichaTratamento::where('id_sede', Auth::user()->cidade_sede)->count();

        $total = $consulta + $tratamento;

        $date1 = date("Y-m-d");

        $consultaDia = ConsultaDentista::where('id_sede', Auth::user()->cidade_sede)
            ->where('created_at', 'like', '%' . $date1 . '%')
            ->get();

        $tratamentoDia = FichaTratamento::where('id_sede', Auth::user()->cidade_sede)
            ->where('created_at', 'like', '%' . $date1 . '%')
            ->get();

        return view('Adm.veOdontologico', [
            'dentistas' => $dentistas,
            'pacientes_atendidos' => $total,
            'consultas' => $consulta,
            'tratamentos' => $tratamento,
            'dentistasAll' => $dentistasAll,
            'consultasAll' => $consultasAll,
            'tratamentosAll' => $tratamentosAll,
            'consultaDia' => $consultaDia,
            'tratamentoDia' => $tratamentoDia
        ]);
    }
}
