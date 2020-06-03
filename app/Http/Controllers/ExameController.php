<?php

namespace App\Http\Controllers;

use App\Exame;
use App\Paciente;
use App\SolicitacaoExame;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Auth;

class ExameController extends Controller
{
    public function indexbuscarExame()
    {
        return view('Usuario.buscarExame', ['exames' => Exame::with(['paciente'])->get()]);
    }

    public function indexcadastroExame()
    {
        $paciente = Paciente::where('id_sede', Auth::user()->cidade_sede)->get();
        return view('Usuario.cadastroExame', [
            'pacientes' => $paciente
        ]);
    }

    public function indexsolicitacaoExame()
    {
        $pacientes = Paciente::where('id_sede', Auth::user()->cidade_sede)->get();
        return view('Usuario.solicitacaoExame', [
            'pacientes' => $pacientes
        ]);
    }

    public function cadastraExame(Request $request)
    {
        $errors = "";
        $data = $request->all();

        $data['comunidade_atendida'] = Auth::user()->localidade;
        $data['id_profissional'] = Auth::user()->id;


        Exame::create($data);

        $response['success'] = true;
        echo json_encode($response);
    }

    public function cadastraSolicitacaoExame(Request $request)
    {
        $data = $request->all();
        $data['id_profissional'] = Auth::user()->id;
        $data['id_localidade'] = Auth::user()->localidade;

        $date_born = $data['data'];
        $date_born = date('Y-m-d', strtotime(str_replace('/', "-", $date_born)));
        $today = date('Y-m-d');


        $response['errors']['data'] = "";

        if ($date_born < $today) {
            $response['success'] = false;
            $response['errors']['data'] = "Data precisa ser igual ou maior que hoje.";
            echo json_encode($response);
        } else {
            SolicitacaoExame::create($data);
            $response['success'] = true;
            echo json_encode($response);
        }
    }

    public function pdfSolicitacao()
    {
        $carai = SolicitacaoExame::where('id_profissional', Auth::user()->id)
            ->with('localidade', 'paciente', 'profissional')
            ->get();

        $valor = [];
        foreach ($carai as $d){
            $valor = $d;
        }

        $pdf = PDF::loadView('Usuario.pdfSolicitacaoExame', compact('valor'));
        return $pdf->setPaper('a4')->stream('Solicitacao.pdf');
    }
}
