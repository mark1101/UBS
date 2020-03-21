<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Encaminhamento;
use App\Exame;
use App\Localidade;
use App\Paciente;
use App\Sede;
use App\Vacina;
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

        $localidades = Localidade::all();
        foreach ($localidades as $localidade) { //MOSTRA QUANTIDADE DE PASSIENTES EM CADA LOCALIDADE
            $paciente[$localidade->id] = Paciente::where('id_localidade',
                $localidade->id)->count();
        }
        foreach ($localidades as $localidade) { //MOSTRA QUANTIDADE DE CONSULTAS
            $consulta[$localidade->id] = Consulta::where('id_localidade',
                $localidade->id)->count();
        }
        foreach ($localidades as $localidade) { //MOSTRA QUANTIDADE DE EXAMES
            $exame[$localidade->id] = Exame::where('comunidade_atendida',
                $localidade->id)->count();
        }
        foreach ($localidades as $localidade){ //MOSTRA QUANTIDADE DE VACINA
            $vacina[$localidade->id] = Vacina::where('id_localidade',
                $localidade->id)->count();
        }
        foreach ($localidades as $localidade){ //MOSTRA QUANTIDADE DE ENCAMINHAMENTOS
            $encaminhamento[$localidade->id] = Encaminhamento::where('id_localidade',
                $localidade->id)->count();
        }

        $localidade = Localidade::where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('nome')
            ->get();

        return view('Adm.cadastroLocalidade', [
            'sedes' => $sede,
            'localidades' => $localidade,
            'pacientes' => $paciente,
            'consultas' => $consulta,
            'exames' => $exame,
            'vacinas' => $vacina,
            'encaminhamentos' => $encaminhamento

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
