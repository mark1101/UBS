<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Encaminhamento;
use App\User;
use App\Vacina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    public function index(){

        $date1 = date("Y-m-d");

        $consulta = Consulta::where('id_localidade', Auth::user()->localidade)
            ->where('id_sede', Auth::user()->cidade_sede)
            ->where('created_at', 'like', '%' . $date1 . '%')->get();
        $vacinas = Vacina::where('id_localidade', Auth::user()->localidade)
            ->where('id_sede', Auth::user()->cidade_sede)
            ->where('created_at', 'like', '%' . $date1 . '%')->get();
        $encaminhamentos = Encaminhamento::where('id_localidade', Auth::user()->localidade)
            ->where('id_sede', Auth::user()->cidade_sede)
            ->where('created_at', 'like', '%' . $date1 . '%')->get();

        return view('inicio' ,[
            'consultas' => $consulta,
            'vacinas' => $vacinas,
            'encaminhamentos' => $encaminhamentos
        ]);
    }
}
