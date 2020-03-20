<?php

namespace App\Http\Controllers;

use App\Localidade;
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

        $data = $request->all();

        $data['id_localidade'] = Auth::user()->localidade;
        $data['id_profissional'] = Auth::user()->id;

        Vacina::create($data);

        return redirect('/mostraVacina');
    }
    public function mostraVacina(Request $request){

        $paciente = Paciente::all();
        $localidade = Localidade::all();

        return view('Usuario.cadastroVacina', [
            'pacientes' => $paciente,
            'localidades' => $localidade
        ], ['vacinas' => Vacina::with(['paciente'])->get(), 'vacinas' => Vacina::with(['localidade'])->get()] );
    }
}
