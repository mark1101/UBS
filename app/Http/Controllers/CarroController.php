<?php

namespace App\Http\Controllers;

use App\Carro;
use App\Localidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarroController extends Controller
{
    public function indexGerencia()
    {
        $data = Carro::where('id_sede', Auth::user()->cidade_sede)->get();
        $localidade = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();

        return view('Adm.gerenciaVeiculos', [
            'data' => $data,
            'localidades' => $localidade
        ]);
    }

    public function gerenciaCarro(Request $request)
    {
        $dataa = $request->all();
        unset($dataa['_token']);

        $data = Carro::where('id_sede',Auth::user()->cidade_sede)->get();

        $response['success'] = true;
        $response['data'] = $data;

        echo json_encode($response);
    }



    public function alteraCarro(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        Carro::where('id', $id)->update($data);

        $response['success'] = true;
        $response['message'] = "Veiculo editado com sucesso!";

        echo json_encode($response);
    }
    public function deletaCarro(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        Carro::where('id', $id)->delete($data);

        $response['success'] = true;
        $response['message'] = "Veiculo deletado com sucesso!";

        echo json_encode($response);
    }
}
