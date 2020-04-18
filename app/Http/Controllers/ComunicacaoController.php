<?php

namespace App\Http\Controllers;

use App\Recado;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComunicacaoController extends Controller
{
    public function index(){
        $user = User::where('localidade', Auth::user()->localidade)
            ->get();
        return view('Usuario.comunicacao' , [
            'profissionais' => $user
        ]);
    }
   /* public function cadastraRecado(Request $request){
        $data = $request->all();

        $data['origem'] = Auth::user()->localidade;

        Recado::create($data);


        $response['success'] = true;
        $response['mensagem enviada com sucesso'];

        echo json_encode($response);

    }*/
}
