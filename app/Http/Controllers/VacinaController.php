<?php

namespace App\Http\Controllers;

use App\Vacina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacinaController extends Controller
{
    public function index(){
        return view('cadastroVacina');
    }

    public function cadastraVacina(Request $request){

        //para fazer tratamento faco o recebimento de $data = $request['atriuto'];
        $data = $request->all();
        Vacina::create($data);

        return redirect('/mostraVacina');
    }
    public function mostraVacina(Request $request){

        $vacinas = DB::table('vacinas')->select('id_vacina', 'posto_vacinacao', 'primeiro_nome', 'nome_paciente', 'vacina_realizada',
            'informacao_lote', 'data', 'dose')->where('primeiro_nome', $request->input('pesquisaVacina'))->get();

        return view('cadastroVacina', ['vacinas' => $vacinas]);
    }
}
