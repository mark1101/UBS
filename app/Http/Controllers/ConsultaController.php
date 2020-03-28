<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Paciente;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    public function indexConsulta()
    {
        $paciente = Paciente::all();
        return view('Usuario.cadastroConsulta', ['pacientes' => $paciente]);
    }

    public function cadastroConsulta(Request $request)
    {
        $data = $request->all();

        $data['id_localidade'] = Auth::user()->localidade;
        $data['id_profissional'] = Auth::user()->id;

        Consulta::create($data);
        return redirect('/consultaCadastro');
    }

    public function mostraConsulta()
    {

        $paciente = Paciente::all();
        $consulta = Consulta::all();
        $profissionais = User::all();

        return view('Usuario.mostraConsulta', ['paciente' => $paciente, 'users' => $profissionais,
            'consultas' => Consulta::with(['paciente', 'profissional', 'localidade'])->get()

        ]);
    }

    public function buscaConsulta(Request $request)
    {

        $paciente = "";
        $todas = "";
        $profissionais = "";


        if ($request->criterio == "") {
            return view('Usuario.mostraConsulta', [
                'consultas' => Consulta::with(['paciente', 'profissional', 'localidade'])->get()
            ]);
        }

        $data = Paciente::where('nome', 'like', '%' . $request->criterio . '%')
            ->get();


        if (count($data) == 0) {
            return view('Usuario.mostraConsulta', [
                'consultas' => $data
            ]);
        }

        foreach ($data as $d) {
            $todas = Consulta::where('id_paciente', $d->id)->get();
        }

        return view('Usuario.mostraConsulta', [
            'paciente' => $paciente,
            'users' => $profissionais,
            'consultas' => $todas
        ]);
    }
}
