<?php

namespace App\Http\Controllers;

use App\Localidade;
use App\Vacina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class veVacinasController extends Controller
{
    public function index()
    {
        $vacinasTotal = Vacina::where('id_sede', Auth::user()->cidade_sede)->count();

        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();

        $localidasCount = [];
        foreach ($localidades as $item){
            $localidasCount[$item->nome] = Vacina::where('id_localidade',$item->id)->count();
        }

        $date1 = date("Y-m-d");
        $vacinaDia = Vacina::where('id_sede', Auth::user()->cidade_sede)
            ->where('created_at', 'like', '%' . $date1 . '%')
            ->get();

        return view('Adm.veVacinas' , [
            'vacinastotal' => $vacinasTotal,
            'localidade' => $localidasCount,
            'vacinasDia' => $vacinaDia
        ]);
    }
}
