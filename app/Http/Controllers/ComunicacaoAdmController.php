<?php

namespace App\Http\Controllers;

use App\Localidade;
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
        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();
       /* $user = User::where('cidade_sede', Auth::user()->cidade_sede)
            ->where('id' , '<>' , Auth::user()->id)
            ->get();*/
        return view('Adm.comunicacaoAdm', [
            'localidades' => $localidades
        ]);
    }
    public function buscaProfissionais($id){

        $users = User::where('localidade', $id)->get();

        $response['success'] = true;
        $response['data'] = $users;

       echo json_encode($response);

    }
}
