<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Encaminhamento;
use App\Localidade;
use App\Paciente;
use App\PacienteTratamento;
use App\User;
use App\Vacina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoricoPacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::where('id_sede', Auth::user()->cidade_sede)->get();
        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();

        $oque = "";

        if (Auth::user()->funcao == "Agente de Saúde") {
            return view('Agente.historicoPaciente', [
                'localidades' => $localidades,
                'pacientes' => $pacientes,
                'oque' => $oque
            ]);
        } else {
            return view('Usuario.historicoPaciente', [
                'localidades' => $localidades,
                'pacientes' => $pacientes,
                'oque' => $oque
            ]);
        }
    }

    public function buscaPacienteId($id)
    {
        $users = Paciente::where('id_localidade', $id)->get();

        $response['success'] = true;
        $response['data'] = $users;

        echo json_encode($response);
    }

    public function buscaHistorico(Request $request)
    {
        $pacientes = Paciente::where('id_sede', Auth::user()->cidade_sede)->get();
        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();
        $oque = "";

        $nome = $request->get('id_paciente');
        $filters = $request->get('filterValues');

        if ($filters == 'consultas') {
            $historico = Consulta::where('id_paciente', $nome)->get();
            $quantos = Consulta::where('id_paciente', $nome)->count();
            $oque = "consulta";

            if (Auth::user()->funcao == "Agente de Saúde") {
                return view('Agente.historicoPaciente', [
                    'pacientes' => $pacientes,
                    'dados' => $historico,
                    'oque' => $oque,
                    'quantidade' => $quantos,
                    'localidades' => $localidades
                ]);
            } else {

                return view('Usuario.historicoPaciente', [
                    'pacientes' => $pacientes,
                    'dados' => $historico,
                    'oque' => $oque,
                    'quantidade' => $quantos,
                    'localidades' => $localidades
                ]);
            }
        } else if ($filters == 'encaminhamentos') {
            $historico = Encaminhamento::where('id_paciente', $nome)->get();
            $quantos = Encaminhamento::where('id_paciente', $nome)->count();
            $oque = "encaminhamentos";

            if (Auth::user()->funcao == "Agente de Saúde") {
                return view('Agente.historicoPaciente', [
                    'pacientes' => $pacientes,
                    'dados' => $historico,
                    'oque' => $oque,
                    'quantidade' => $quantos,
                    'localidades' => $localidades
                ]);
            } else {

                return view('Usuario.historicoPaciente', [
                    'pacientes' => $pacientes,
                    'dados' => $historico,
                    'oque' => $oque,
                    'quantidade' => $quantos,
                    'localidades' => $localidades
                ]);
            }

        } else if ($filters == 'vacinas') {
            $historico = Vacina::where('id_paciente', $nome)->get();
            $quantos = Vacina::where('id_paciente', $nome)->count();
            $oque = "vacinas";

            if (Auth::user()->funcao == "Agente de Saúde") {
                return view('Agente.historicoPaciente', [
                    'pacientes' => $pacientes,
                    'dados' => $historico,
                    'oque' => $oque,
                    'quantidade' => $quantos,
                    'localidades' => $localidades
                ]);
            } else {

                return view('Usuario.historicoPaciente', [
                    'pacientes' => $pacientes,
                    'dados' => $historico,
                    'oque' => $oque,
                    'quantidade' => $quantos,
                    'localidades' => $localidades
                ]);
            }

        } else if ($filters == "tratamentos") {
            $historico = PacienteTratamento::where('id_paciente', $nome)->get();
            $quantos = PacienteTratamento::where('id_paciente', $nome)->count();
            $oque = "tratamentos";

            if (Auth::user()->funcao == "Agente de Saúde") {
                return view('Agente.historicoPaciente', [
                    'pacientes' => $pacientes,
                    'dados' => $historico,
                    'oque' => $oque,
                    'quantidade' => $quantos,
                    'localidades' => $localidades
                ]);
            } else {

                return view('Usuario.historicoPaciente', [
                    'pacientes' => $pacientes,
                    'dados' => $historico,
                    'oque' => $oque,
                    'quantidade' => $quantos,
                    'localidades' => $localidades
                ]);
            }
        } else {
            $historico = "";
            $quantos = "";
            $oque = "Erro ao pesquisar";

            if (Auth::user()->funcao == "Agente de Saúde") {
                return view('Agente.historicoPaciente', [
                    'pacientes' => $pacientes,
                    'dados' => $historico,
                    'oque' => $oque,
                    'quantidade' => $quantos,
                    'localidades' => $localidades
                ]);
            } else {

                return view('Usuario.historicoPaciente', [
                    'localidades' => $localidades,
                    'pacientes' => $pacientes,
                    'dados' => $historico,
                    'oque' => $oque,
                    'quantidade' => $quantos,

                ]);
            }
        }

    }
}
