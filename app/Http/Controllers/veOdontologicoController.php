<?php

namespace App\Http\Controllers;

use App\ConsultaDentista;
use App\EncaminhamentoOdonto;
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

        $consultasAll = ConsultaDentista::where('id_sede' , Auth::user()->cidade_sede)->orderBy('created_at', 'desc')->get();
        $tratamentosAll = FichaTratamento::where('id_sede', Auth::user()->cidade_sede)->orderBy('created_at', 'desc')->get();
        $encaminhamentoAll = EncaminhamentoOdonto::where('id_sede', Auth::user()->cidade_sede)->orderBy('created_at', 'desc')->get();

        $consulta = ConsultaDentista::where('id_sede', Auth::user()->cidade_sede)->count();
        $tratamento = FichaTratamento::where('id_sede', Auth::user()->cidade_sede)->count();
        $encaminhamento = EncaminhamentoOdonto::where('id_sede', Auth::user()->cidade_sede)->count();

        $total = $consulta + $tratamento;


        $date1 = date("Y-m-d");

        $cd = ConsultaDentista::where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('created_at', 'desc')
            ->get();

        $consultaDia = [];
        foreach ($cd as $item){
            if(date('d-m-Y', strtotime($item->created_at)) == date('d-m-Y')){
                $consultaDia[] = $item;
            }
        }

        $td = FichaTratamento::where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('created_at', 'desc')
            ->get();

        $tratamentoDia = [];
        foreach ($td as $item){
            if(date('d-m-Y', strtotime($item->created_at)) == date('d-m-Y')){
                $tratamentoDia[] = $item;
            }
        }

        $enc = EncaminhamentoOdonto::where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('created_at', 'desc')
            ->get();

        $encamimhamentoDia = [];
        foreach ($enc as $item){
            if(date('d-m-Y', strtotime($item->created_at)) == date('d-m-Y')){
                $encamimhamentoDia[] = $item;
            }
        }

        return view('Adm.veOdontologico', [
            'dentistas' => $dentistas,
            'pacientes_atendidos' => $total,
            'consultas' => $consulta,
            'tratamentos' => $tratamento,
            'encaminhamentos' => $encaminhamento,
            'dentistasAll' => $dentistasAll,
            'consultasAll' => $consultasAll,
            'tratamentosAll' => $tratamentosAll,
            'encaminhamentoAll' => $encaminhamentoAll,
            'consultaDia' => $consultaDia,
            'tratamentoDia' => $tratamentoDia,
            'encaminhamentoDia' => $encamimhamentoDia
        ]);
    }
}
