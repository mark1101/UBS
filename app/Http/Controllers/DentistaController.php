<?php

namespace App\Http\Controllers;

use App\ConsultaDentista;
use App\Dentista;
use App\FichaTratamento;
use App\Localidade;
use App\Paciente;
use App\Recado;
use App\SolicitacaoExameOdonto;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DentistaController extends Controller
{
    public function indexAdm()
    {
        return view('Dentista.administracaoDentista');
    }

    public function indexConsulta()
    {
        $paciente = Paciente::all();
        $localidade = Localidade::all();
        return view('Dentista.cadastroConsultaOdonto', [
            'pacientes' => $paciente,
            'localidades' => $localidade
        ]);
    }

    public function indexTratamento()
    {
        $paciente = Paciente::all();
        $localidade = Localidade::all();

        return view('Dentista.fichaTratamento', [
            'pacientes' => $paciente,
            'localidades' => $localidade
        ]);
    }

    public function indexSolicitacaoExame()
    {
        $paciente = Paciente::all();
        $localidade = Localidade::all();

        return view('Dentista.solicitacaoExameOdonto', [
            'pacientes' => $paciente,
            'localidades' => $localidade
        ]);
    }

    public function indexOdontologico()
    {
        $consultas = ConsultaDentista::where('id_profissional', Auth::user()->id)->count();
        $tratamentos = FichaTratamento::where('id_profissional', Auth::user()->id)->count();
        $exames = SolicitacaoExameOdonto::where('id_profissional', Auth::user()->id)->count();


        return view('Dentista.odontologico', [
            'consultas' => $consultas,
            'tratamentos' => $tratamentos,
            'exames' => $exames
        ]);

    }

    public function agendamentoDentista()
    {

        $localidade = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();
        $paciente = Paciente::where('id_localidade', Auth::user()->localidade)->get();
        $dentistas = User::where('funcao', 'Odontologia')
            ->where('cidade_sede', Auth::user()->cidade_sede)->get();

        return view('Usuario.agendamentoDentista', [
            'localidades' => $localidade,
            'pacientes' => $paciente,
            'dentistas' => $dentistas
        ]);
    }

    public function cadastraConsultaDentista(Request $request) // CADASTRAMENTO DE CONSULTA INICIAL
    {
        $data = $request->all();
        $data['id_profissional'] = Auth::user()->id;
        $data['id_sede'] = Auth::user()->cidade_sede;

        ConsultaDentista::create($data);
        $this->pdfConsulta();

        return redirect('/odonto/consulta');
    }

    public function cadastraTratamentoDentista(Request $request)
    {
        $data = $request->all();
        $data['id_profissional'] = Auth::user()->id;
        $data['id_sede'] = Auth::user()->cidade_sede;

        FichaTratamento::create($data);
        $this->pdfTratamento();

        return redirect('/fichaTratamento');
    }

    public function cadastraSolicitacaoExame(Request $request)
    {
        $data = $request->all();
        $data['id_profissional'] = Auth::user()->id;
        $data['id_sede'] = Auth::user()->cidade_sede;

        SolicitacaoExameOdonto::create($data);

        return redirect('/solicitacaoExameOdonto');
    }

    public function pdfTratamento()
    {

        $dataa = FichaTratamento::where('id_profissional', Auth::user()->id)
            ->with(['paciente', 'localidade'])
            ->get();

        $data = $dataa[count($dataa)-1];


        $pdf = PDF::loadView('Dentista.pdfTratamento', compact('data'));
        return $pdf->setPaper('a4')->stream('FichaTratamento.pdf');
    }

    public function pdfConsulta()
    {
        $dataa = ConsultaDentista::where('id_profissional', Auth::user()->id)
            ->with(['paciente','localidade','sede'])
            ->get();

        $data = $dataa[count($dataa)-1];

        $pdf = PDF::loadView('Dentista.pdfConsulta', compact('data'));
        return $pdf->setPaper('a4')->stream('FichaConsulta.pdf');
    }

    public function pdfExame()
    {
        $dataa = SolicitacaoExameOdonto::where('id_profissional', Auth::user()->id)
            ->with(['paciente','localidade'])
            ->get();

        $data = $dataa[count($dataa)-1];

        $pdf = PDF::loadView('Dentista.pdfExame', compact('data'));
        return $pdf->setPaper('a4')->stream('FichaExame.pdf');
    }

    public function indexRecadoDentista()
    {
        $recado = Recado::where('destino', Auth::user()->id)
            ->orderBy('created_at')
            ->get();

        return view('Dentista.recadoDentista', [
            'rs' => $recado
        ]);
    }

    public function indexComunicacaoDentista()
    {
        $users = User::where('localidade', Auth::user()->localidade)
            ->where('cidade_sede', Auth::user()->cidade_sede)
            ->get();
        return view('Dentista.comunicacaoOdonto', [
            'profissionais' => $users
        ]);
    }

    public function cadastraRecadoDentista(Request $request)
    {
        $data = $request->all();
        $data['origem'] = Auth::user()->localidade;
        $data['mandante'] = Auth::user()->id;
        $data['modulo_trabalho'] = Auth::user()->funcao;

        Recado::create($data);

        $response['success'] = true;

        echo json_encode($response);
    }

    public function indexHistorico()
    {
        $localidade = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();
        $oque = "";

        return view('Dentista.historicoPacienteOdonto', [
            'localidades' => $localidade,
            'oque' => $oque
        ]);
    }

    public function buscaPacienteHistorico($id)
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
            $historico = ConsultaDentista::where('id_paciente', $nome)->get();
            $quantos = ConsultaDentista::where('id_paciente', $nome)->count();
            $oque = "consulta";

            return view('Dentista.historicoPacienteOdonto', [
                'pacientes' => $pacientes,
                'dados' => $historico,
                'oque' => $oque,
                'quantidade' => $quantos,
                'localidades' => $localidades
            ]);
        } else if ($filters == 'encaminhamentos') {
            $historico = Encaminhamento::where('id_paciente', $nome)->get();
            $quantos = Encaminhamento::where('id_paciente', $nome)->count();
            $oque = "encaminhamentos";

            return view('Dentista.historicoPacienteOdonto', [
                'pacientes' => $pacientes,
                'dados' => $historico,
                'oque' => $oque,
                'quantidade' => $quantos
            ]);

        } else if ($filters == 'tratamentos') {
            $historico = FichaTratamento::where('id_paciente', $nome)->get();
            $quantos = FichaTratamento::where('id_paciente', $nome)->count();
            $oque = "tratamentos";

            return view('Dentista.historicoPacienteOdonto', [
                'pacientes' => $pacientes,
                'dados' => $historico,
                'oque' => $oque,
                'quantidade' => $quantos,
                'localidades' => $localidades
            ]);

        } else if ($filters == 'exames') {
            $historico = SolicitacaoExameOdonto::where('id_paciente', $nome)->get();
            $quantos = SolicitacaoExameOdonto::where('id_paciente', $nome)->count();
            $oque = "solicita";

            return view('Dentista.historicoPacienteOdonto', [
                'pacientes' => $pacientes,
                'dados' => $historico,
                'oque' => $oque,
                'quantidade' => $quantos,
                'localidades' => $localidades
            ]);

        } else {
            $historico = "";
            $quantos = "";
            $oque = "Erro ao pesquisar";

            return view('Dentista.historicoPacienteOdonto', [
                'localidades' => $localidades,
                'pacientes' => $pacientes,
                'dados' => $historico,
                'oque' => $oque,
                'quantidade' => $quantos,

            ]);
        }

    }
}
