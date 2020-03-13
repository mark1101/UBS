<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Vacina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VacinaController extends Controller
{
    public function index(){
        $paciente = Paciente::all();
        return view('Usuario.cadastroVacina' , [
            'pacientes' , $paciente
        ]);
    }

    public function cadastraVacina(Request $request){

        //para fazer tratamento faco o recebimento de $data = $request['atriuto'];
        $data = $request->all();
        $data['localidade'] = Auth::user()->localidade;

        Vacina::create($data);
        return redirect('/mostraVacina');
    }
    public function mostraVacina(Request $request){
        return view('Usuario.cadastroVacina', ['vacinas' => Vacina::with(['pacientes'])->get()]);
    }
}
