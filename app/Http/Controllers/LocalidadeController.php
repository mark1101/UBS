<?php

namespace App\Http\Controllers;

use App\Localidade;
use App\Paciente;
use App\Sede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocalidadeController extends Controller
{
    public function cadastraLocalidade(Request $request)
    {
        $data = $request->all();
        Localidade::create($data);
    }

    public function indexCadastroLocalidade()
    {
        $sede = Sede::all();
        $paciente = Paciente::where('id_localidade', Localidade::all())->count();

        $localidade = Localidade::where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('nome')
            ->get();

        return view('Adm.cadastroLocalidade', [
            'sedes' => $sede,
            'localidades' => $localidade,
            'pacientes' => $paciente
        ]);
    }

    public function cadastroSede(Request $request)
    {
        $data = $request->all();
        Sede::create($data);

        return redirect('/cadastroLocalidade');

    }

    public function cadastroLocalidade(Request $request)
    {

        $data = $request->all();
        Localidade::create($data);
        return redirect('/cadastroLocalidade');
    }

}
