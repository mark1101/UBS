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

        $vd= Vacina::where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('data', 'desc')
            ->get();

        $vacinaDia = [];
        foreach ($vd as $item){
            if(date('d-m-Y', strtotime($item->data)) == date('d-m-Y')){
                $vacinaDia[] = $item;
            }
        }


        return view('Adm.veVacinas' , [
            'vacinastotal' => $vacinasTotal,
            'localidade' => $localidasCount,
            'vacinasDia' => $vacinaDia
        ]);
    }
}
