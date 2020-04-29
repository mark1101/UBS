<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Localidade;
use App\Recado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecadoController extends Controller
{
    public function index(){

        $recado = Recado::where('destino' , Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $user = Auth::user()->localidade;

        return view('Usuario.recado' , [
            'rs' => $recado,
            'usuarioLocalidade' => $user
        ]);
    }

    public function cadastraRecado(Request $request)
    {
        $data = $request->all();
        $data['origem'] = Auth::user()->localidade;
        $data['mandante'] = Auth::user()->id;
        $data['modulo_trabalho'] = Auth::user()->funcao;

        Recado::create($data);

        $response['success'] = true;

        echo json_encode($response);


    }

}
