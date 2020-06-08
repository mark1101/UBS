<?php

namespace App\Http\Controllers;

use App\Exame;
use App\Localidade;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class veExamesController extends Controller
{
    public function index()
    {
        $examesAll = Exame::where('id_sede', Auth::user()->cidade_sede)->get();
        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();


        $localidasCount = [];
        foreach ($localidades as $item){
            $localidasCount[$item->nome] = Exame::where('comunidade_atendida',$item->id)->count();
        }


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
            $profissionais[$count]['count'] = Exame::where('id_profissional', $item->id)->count();
            $comunidade = Localidade::where('id', $item->localidade)->get();
            foreach ($comunidade as $local){
                $profissionais[$count]['localidade'] = $local;
            }
            $count++;
        }


        foreach ($medico as $item) {
            $profissionais[$count]['data'] = $item;
            $profissionais[$count]['count'] = Exame::where('id_profissional', $item->id)->count();
            $comunidade = Localidade::where('id', $item->localidade)->get();
            foreach ($comunidade as $local){
                $profissionais[$count]['localidade'] = $local;
            }
            $count++;
        }

        $c = Exame::where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('data', 'desc')
            ->get();

        $exameDia= [];
        foreach ($c as $item){
            if(date('d-m-Y', strtotime($item->data)) == date('d-m-Y')){
                $exameDia[] = $item;
            }
        }


        return view('Adm.veExames', [
            'examesAll' => $examesAll,
            'exames' => count($examesAll),
            'profissionaisTotal' => count($medico) + count($enfermeiro),
            'pro' => $profissionais,
            'localidades' => $localidasCount,
            'examesDia' => $exameDia,
            'localidade' => $localidasCount

        ]);
    }
}
