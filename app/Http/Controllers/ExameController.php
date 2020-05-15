<?php

namespace App\Http\Controllers;

use App\Exame;
use App\Paciente;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Auth;

class ExameController extends Controller
{
    public function indexbuscarExame()
    {
        return view('Usuario.buscarExame',['exames'=>Exame::with(['paciente'])->get()]);
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
        return view('Usuario.solicitacaoExame');
    }

    public function cadastraExame(Request $request)
    {
        $errors = "";
        $data = $request->all();

        $data['comunidade_atendida'] = Auth::user()->localidade;
        $data['id_profissional'] = Auth::user()->id;

        if($request->file('arquivo')->isValid()){

        }

        Exame::create($data);
        return redirect('/exame/cadastro');
    }

    public function cadastraSolicitacaoExame(Request $request)
    {
        $data = $request->all();

        $data['comunidade_atendida'] = Auth::user()->localidade;
        return redirect('/exame/solicitacao');
    }
}
