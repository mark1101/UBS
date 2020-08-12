<?php

namespace App\Http\Controllers;

use App\Localidade;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class veProfissionaisController extends Controller
{
    public function index()
    {
        $prof = User::where('cidade_sede', Auth::user()->cidade_sede)->get();
        $localidade = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();
        return view('Adm.veProfissionais',[
            'profissionais' => $prof,
            'localidades' => $localidade
        ]);
    }

    public function mostraProfissional(Request $request)
    {
        $dataa = $request->all();
        unset($dataa['_token']);

        $cidade = Auth::user()->cidade_sede;

        $data = User::where('cidade_sede', $cidade)
            ->where('name', 'like', '%' . $request->criterio . '%')
            ->orWhere('funcao', 'like' , '%'. $request->criterio. '%')
            ->where('cidade_sede', $cidade)
            ->get();

        $response['success'] = true;
        $response['data'] = $data;

        echo json_encode($response);
    }
}
