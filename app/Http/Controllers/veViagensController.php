<?php

namespace App\Http\Controllers;

use App\Localidade;
use App\Viagens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class veViagensController extends Controller
{
    public function index()
    {
        $localidade = Localidade::where('id_sede', Auth::user()->cidade_sede)
            ->get();

        $valores = Viagens::where('id_sede', Auth::user()->cidade_sede)
            ->with('motorista', 'carro', 'localidadeOrigem')
            ->get();


        $vd = Viagens::where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('created_at', 'desc')
            ->get();

        $viagemDia = [];
        foreach ($vd as $item){
            if(date('d-m-Y', strtotime($item->created_at)) == date('d-m-Y')){
                $viagemDia[] = $item;
            }
        }

        return view('Adm.veViagens', [
            'local' => $localidade,
            'valores' => $valores,
            'viagemDia' => $viagemDia
        ]);
    }

    public function mostraViagem(Request $request)
    {
        $localidade = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();

        $data = $request->localidade;

        $busca = Localidade::where('id_sede', Auth::user()->cidade_sede)
            ->where('nome', $data)->get();


        foreach ($busca as $item) {
            $total = $item;
        }

        $manda = Viagens::where('id_origem', $total->id)->orderBy('data')->get();


        $vd = Viagens::where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('created_at', 'desc')
            ->get();

        $viagemDia = [];
        foreach ($vd as $item){
            if(date('d-m-Y', strtotime($item->created_at)) == date('d-m-Y')){
                $viagemDia[] = $item;
            }
        }

        $valores = Viagens::where('id_sede', Auth::user()->cidade_sede)
            ->get();

        return view('Adm.veViagens', [
            'local' => $localidade,
            'viagemDia' => $viagemDia,
            'valores' => $manda
        ]);
    }
}
