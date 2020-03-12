<?php

namespace App\Http\Controllers;

use App\Localidade;
use App\Paciente;
use Illuminate\Http\Request;

class LocalidadeController extends Controller
{
    public function cadastraLocalidade(Request $request){
        $data = $request->all();
        $data['sede'] = 1;
        Localidade::create($data);
    }

}
