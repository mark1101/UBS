<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Localidade;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class veConsultasController extends Controller
{
    public function index()
    {

        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();


        $consultasTotal = Consulta::where('id_sede', Auth::user()->cidade_sede)->count();


        $enfermeiro = User::where('cidade_sede', (int)Auth::user()->cidade_sede)
            ->where('funcao', 'Enfermagem')
            ->get();
        $medico = User::where('cidade_sede', (int)Auth::user()->cidade_sede)
            ->where('funcao', 'Medicina')
            ->get();

        $profissionais = [];
        $count = 0;
        foreach ($enfermeiro as $item) {
            $profissionais[$count]['data'] = $item;
            $profissionais[$count]['count'] = Consulta::where('id_profissional', $item->id)->count();
            $count++;
        }

        foreach ($medico as $item) {
            $profissionais[$count]['data'] = $item;
            $profissionais[$count]['count'] = Consulta::where('id_profissional', $item->id)->count();
            $count++;
        }
        $localidasCount = [];
        foreach ($localidades as $item){
            $localidasCount[$item->nome] = Consulta::where('id_localidade',$item->id)->count();
        }

        return view('Adm.veConsultas', ['consultas' => $consultasTotal,
            //'profissionaisConsultas' => $consulta,
            'profissionaisTotal' => count($medico) + count($enfermeiro), // numero em quantidade que mostra no card
            'pro' => $profissionais,
            'localidade' => $localidasCount,
        ]);

    }
}
