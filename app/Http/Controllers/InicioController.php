<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Encaminhamento;
use App\FichaEntrada;
use App\Paciente;
use App\Recado;
use App\User;
use App\Vacina;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    public function index(){

        $date1 = date("Y-m-d");
        $pacientes = Paciente::where('id_sede', Auth::user()->cidade_sede)->get();

        $users = User::where('id', Auth::user()->id)
            ->with(['localidade'])
            ->get();

        $valor = $users[count($users) - 1];



        $c = Consulta::where('id_localidade', Auth::user()->localidade)
            ->where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('data', 'desc')
            ->get();
        $v = Vacina::where('id_localidade', Auth::user()->localidade)
            ->where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('data', 'desc')
            ->get();
        $e = Encaminhamento::where('id_localidade', Auth::user()->localidade)
            ->where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('created_at', 'desc')
            ->get();

        $consultas = [];
        foreach ($c as $consulta){
            if(date('d-m-Y', strtotime($consulta->created_at)) == date('d-m-Y')){
                $consultas[] = $consulta;
            }
        }

        $vacinas = [];
        foreach ($v as $vacina){
            if(date('d-m-Y', strtotime($vacina->created_at)) == date('d-m-Y')){
                $vacinas[] = $vacina;
            }
        }


        $encaminhamentos = [];
        foreach ($e as $encaminhamento){
            if(date('d-m-Y', strtotime($encaminhamento->created_at)) == date('d-m-Y')){
                $encaminhamentos[] = $encaminhamento;
            }
        }

        $r = Recado::where('destino' , Auth::user()->id)
            ->orderBy('data', 'desc')
            ->get();

        $recados = [];
        foreach ($r as $item){
            if(date('d-m-Y', strtotime($item->created_at)) == date('d-m-Y')){
                $recados[] = $item;
            }
        }

        $recado = count($recados);

        $ficha = FichaEntrada::where('id_localidade', Auth::user()->localidade)->get();

        return view('inicio' ,[
            'pacientes' => $pacientes,
            'consultas' => $consultas,
            'vacinas' => $vacinas,
            'encaminhamentos' => $encaminhamentos,
            'recado' => $recado,
            'usuario' => $valor,
            'fichas' => $ficha
        ]);
    }
}
