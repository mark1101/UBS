<?php

namespace App\Http\Controllers;

use App\Encaminhamento;
use App\Localidade;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class veEncaminhamentosController extends Controller
{
    public function index()
    {
        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();
        $encaminhamentosTotal = Encaminhamento::where('id_sede', Auth::user()->cidade_sede)->count();

        $medico = User::where('cidade_sede', (int)Auth::user()->cidade_sede)
            ->where('funcao', 'Medicina')
            ->get();

        $enfermeiro = User::where('cidade_sede', (int)Auth::user()->cidade_sede)
            ->where('funcao', 'Enfermagem')
            ->get();

        $profissionais = [];
        $count = 0;
        foreach ($medico as $item) {
            $profissionais[$count]['data'] = $item;
            $profissionais[$count]['count'] = Encaminhamento::where('id_profissional', $item->id)->count();
            $comunidade = Localidade::where('id', $item->localidade)->get();
            foreach ($comunidade as $local) {
                $profissionais[$count]['localidade'] = $local;
            }
            $count++;
        }

        foreach ($enfermeiro as $item) {
            $profissionais[$count]['data'] = $item;
            $profissionais[$count]['count'] = Encaminhamento::where('id_profissional', $item->id)->count();
            $comunidade = Localidade::where('id', $item->localidade)->get();
            foreach ($comunidade as $local) {
                $profissionais[$count]['localidade'] = $local;
            }
            $count++;
        }

        $localidasCount = [];
        foreach ($localidades as $item) {
            $localidasCount[$item->nome] = Encaminhamento::where('id_localidade', $item->id)->count();
        }

        $date1 = date("Y-m-d");
        $e = Encaminhamento::where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('created_at', 'desc')
            ->get();

        $encaminhamentoDia = [];
        foreach ($e as $item) {
            if (date('d-m-Y', strtotime($item->data)) == date('d-m-Y')) {
                $encaminhamentoDia[] = $item;
            }
        }

        return view('Adm.veEncaminhamentos', [
            'encaminhamentos' => $encaminhamentosTotal,
            'profissionaisTotal' => count($medico) + count($enfermeiro),
            'pro' => $profissionais,
            'localidade' => $localidasCount,
            'encaminhamentoDia' => $encaminhamentoDia
        ]);

    }
}
