<?php

namespace App\Http\Controllers;

use App\FichaEntrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FichaEntradaController extends Controller
{
    public function store( Request $request)
    {
        $data = $request->all();
        $data['id_localidade'] = Auth::user()->localidade;

        FichaEntrada::create($data);

        $response['success'] = true;
        echo json_encode($response);

    }

    public function mostra(){

        $e = FichaEntrada::where('id_localidade', Auth::user()->localidade)
            ->orderBy('data', 'desc')
            ->get();



        $entradas = [];
        foreach ($e as $item){
            if(date('d-m-Y', strtotime($item->created_at)) == date('d-m-Y')){
                $entradas[] = $item;
            }
        }

        for ($i = 0; $i < count($entradas); $i++) {
            $data[$i]['id_paciente'] = ($entradas[$i]->paciente)->nome ."". ($entradas[$i]->paciente)->ultimo_nome;
        }


        $response['success'] = true;
        $response['data'] = $entradas;

        echo json_encode($response);

    }
}
