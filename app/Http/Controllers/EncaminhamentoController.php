<?php

namespace App\Http\Controllers;

use App\Encaminhamento;
use App\Paciente;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EncaminhamentoController extends Controller
{
    public function index()
    {
        $paciente = Paciente::where('id_localidade' , Auth::user()->localidade)->get();
        $user = User::all();

        return view('Usuario.encaminhamento', ['pacientes' => $paciente , 'profissionais' => $user]);
    }

    public function cadastroEncaminhamento(Request $request)
    {

        $data = $request->all();
        unset($data["_token"]);

        $data['id_localidade'] = Auth::user()->localidade;
        Encaminhamento::create($data);


        return redirect('/encaminhamento');
    }

}
