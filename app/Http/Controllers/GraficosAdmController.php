<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Localidade;
use App\Motorista;
use App\Paciente;
use App\User;
use App\Vacina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GraficosAdmController extends Controller
{
    public function index(){
        $enfermeiro = User::where('cidade_sede', Auth::user()->cidade_sede)
            ->where('funcao' , 'Enfermagem')
            ->count();

        $medico = User::where('cidade_sede', Auth::user()->cidade_sede)
            ->where('funcao' , 'Medicina')
            ->count();

        $agente = User::where('cidade_sede', Auth::user()->cidade_sede)
            ->where('funcao' , 'Agente de Saúde')
            ->count();

        $recepcao = User::where('cidade_sede', Auth::user()->cidade_sede)
            ->where('funcao' , 'Recepcao')
            ->count();

        $dentista = User::where('cidade_sede', Auth::user()->cidade_sede)
            ->where('funcao' , 'Odontologia')
            ->count();

        $motorista = Motorista::where('id_sede', Auth::user()->cidade_sede)
            ->count();

        // QUANTIDADE DE PACIENTE POR LOCALIDADE

        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();
        $paciente = Paciente::where('id_sede', Auth::user()->cidade_sede)->get();

        foreach ($localidades as $localidade) { //MOSTRA QUANTIDADE DE PACIENTES EM CADA LOCALIDADE
            $paciente[$localidade->id] = Paciente::where('id_localidade',
                $localidade->id)->count();
        }

        return view('Adm.graficoContador' , [
            'enfermeiro' => $enfermeiro,
            'medico' => $medico,
            'agente' => $agente,
            'recepcao' => $recepcao,
            'dentista' => $dentista,
            'motorista' => $motorista,
            'localidades' => $localidades,
            'pacientes' => $paciente
        ]);
    }

    public function indexVacina()
    {
        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();

        $localidasCount = [];
        foreach ($localidades as $item){
            $localidasCount[$item->nome] = Vacina::where('id_localidade',$item->id)->count();
        }
        return view('Adm.graficoVacina',[
            'localidades' => $localidasCount
        ]);
    }

    public function indexConsulta()
    {
        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();

        $localidasCount = [];
        foreach ($localidades as $item){
            $localidasCount[$item->nome] = Consulta::where('id_localidade',$item->id)->count();
        }
        return view('Adm.graficoConsulta',[
            'localidades' => $localidasCount
        ]);
    }
}
