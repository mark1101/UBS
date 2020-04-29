<?php

namespace App\Http\Controllers;

use App\Recado;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComunicacaoAdmController extends Controller
{
    public function indexRecadoAdm(){
        $recado = Recado::where('destino' , Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Adm.recadosAdm',[
            'rs' => $recado,
        ]);
    }

    public function indexComunicacaoAdm()
    {
        $user = User::where('localidade', Auth::user()->localidade)
            ->where('cidade_sede', Auth::user()->cidade_sede)
            ->where('id' , '<>' , Auth::user()->id)
            ->get();

        return view('Adm.comunicacaoAdm',[
            'profissionais' => $user
        ]);
    }
}
