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
            ->with('motorista', 'carro', 'localidadeOrigem', 'localidadeDestino')
            ->get();

        $date1 = date("Y-m-d");
        $viagemDia = Viagens::where('id_sede', Auth::user()->cidade_sede)
            ->where('created_at', 'like', '%' . $date1 . '%')
            ->get();

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


        $date1 = date("Y-m-d");

        $viagemDia = Viagens::where('id_sede', Auth::user()->cidade_sede)
            ->where('created_at', 'like', '%' . $date1 . '%')
            ->get();

        return view('Adm.veViagens', [
            'local' => $localidade,
            'viagemDia' => $viagemDia,
        ]);
    }
}
