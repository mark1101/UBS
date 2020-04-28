<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Encaminhamento;
use App\Paciente;
use App\Vacina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class historicoPacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::where('id_sede', Auth::user()->cidade_sede)->get();
        $oque = "";
        return view('Usuario.historicoPaciente', [
            'pacientes' => $pacientes,
            'oque' => $oque
        ]);
    }

    public function buscaHistorico(Request $request)
    {
        $pacientes = Paciente::where('id_sede', Auth::user()->cidade_sede)->get();
        $oque = "";

        $nome = $request->get('id_paciente');
        $filters = $request->get('filterValues');

        if ($filters == 'consultas') {
            $historico = Consulta::where('id_paciente', $nome)->get();
            $quantos = Consulta::where('id_paciente', $nome)->count();
            $oque = "consulta";

            return view('Usuario.historicoPaciente', [
                'pacientes' => $pacientes,
                'dados' => $historico,
                'oque' => $oque,
                'quantidade' => $quantos
            ]);
        } else if ($filters == 'encaminhamentos') {
            $historico = Encaminhamento::where('id_paciente', $nome)->get();
            $quantos = Encaminhamento::where('id_paciente', $nome)->count();
            $oque = "encaminhamentos";

            return view('Usuario.historicoPaciente', [
                'pacientes' => $pacientes,
                'dados' => $historico,
                'oque' => $oque,
                'quantidade' => $quantos
            ]);

        } else if ($filters == 'vacinas') {
            $historico = Vacina::where('id_paciente', $nome)->get();
            $quantos = Vacina::where('id_paciente', $nome)->count();
            $oque = "vacinas";

            return view('Usuario.historicoPaciente', [
                'pacientes' => $pacientes,
                'dados' => $historico,
                'oque' => $oque,
                'quantidade' => $quantos
            ]);

        }else{
            $historico = "";
            $quantos = "";
            $oque = "Erro ao pesquisar";

            return view('Usuario.historicoPaciente', [
                'pacientes' => $pacientes,
                'dados' => $historico,
                'oque' => $oque,
                'quantidade' => $quantos
            ]);
        }

    }
}
