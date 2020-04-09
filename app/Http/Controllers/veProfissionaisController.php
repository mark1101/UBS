<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class veProfissionaisController extends Controller
{
    public function index()
    {
        return view('Adm.veProfissionais');
    }

    public function mostraProfissional(Request $request)
    {

        $data = User::where('name', 'like', '%' . $request->criterio . '%')
            ->orWhere('funcao', 'like' , '%'. $request->criterio. '%')
            ->where('cidade_sede', (int)Auth::user()->cidade_sede)
            //->with(['localidade'])
            ->get();

        //dd($data);

       /* for ($i = 0; $i < count($data); $i++) {
            $data[$i]['localidade'] = ($data[$i]->localidade)->nome;
        }*/


        $response['success'] = true;
        $response['data'] = $data;

        echo json_encode($response);
    }
}
