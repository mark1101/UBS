<?php

namespace App\Http\Controllers;

use App\Vacina;
use Illuminate\Http\Request;

class CadastroVacinaController extends Controller
{
    public function index(){
        return view('cadastroVacina');
    }

    public function cadastraVacina(Request $request){

        //para fazer tratamento faco o recebimento de $data = $request['atriuto'];
        $data = $request->all();
        Vacina::create($data);

        return redirect('/cadastroVacina');
    }
}
