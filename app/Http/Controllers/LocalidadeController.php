<?php

namespace App\Http\Controllers;

use App\Localidade;
use App\Paciente;
use App\Sede;
use Illuminate\Http\Request;

class LocalidadeController extends Controller
{
    public function cadastraLocalidade(Request $request){
        $data = $request->all();
        Localidade::create($data);
    }
    public function indexCadastroLocalidade(){
        $sede = Sede::all();
        return view('Adm.cadastroLocalidade', [
            'sedes' => $sede
        ]);
    }
    public function cadastroSede(Request $request){
        $data = $request->all();
        Sede::create($data);

        return redirect('/cadastroLocalidade');

    }
    public function cadastroLocalidade(Request $request){

        $data = $request->all();
        Localidade::create($data);
        return redirect('/cadastroLocalidade');
    }

}
