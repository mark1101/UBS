<?php

namespace App\Http\Controllers;

use App\Exame;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Auth;

class ExameController extends Controller
{
    public function indexbuscarExame()
    {        //dd(($exame->paciente)->nome);
        return view('Usuario.buscarExame',['exames'=>Exame::with(['paciente'])->get()]);
    }

    public function indexcadastroExame()
    {
        $paciente = Paciente::all();
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

        Exame::create($data);

        return redirect('/cadastroExame');
    }

    public function cadastraSolicitacaoExame(Request $request)
    {
        $data = $request->all();
        return redirect('/solicitacaoExame');
    }
}
