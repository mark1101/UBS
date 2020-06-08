<?php

namespace App\Http\Controllers;

use App\ConsultaDentista;
use App\Encaminhamento;
use App\EncaminhamentoOdonto;
use App\FichaTratamento;
use App\Paciente;
use App\Sede;
use App\User;
use App\Vacina;
use App\Viagens;
use App\Consulta;
use Illuminate\Http\Request;

class GerenciadorController extends Controller
{
    public function index()
    {
        $adm = User::where('funcao', 'administrador')
            ->with('localidade')
            ->get();

        $sedes = Sede::all();

        $pacientes = Paciente::all()->count();

        $consultas = ConsultaDentista::all()->count();
        $consultasd = Consulta::all()->count();
        $tratamento = FichaTratamento::all()->count();
        $vacinas = Vacina::all()->count();
        $encaminhamento = Encaminhamento::all()->count();
        $eO = EncaminhamentoOdonto::all()->count();
        $viagens = Viagens::all()->count();

        $tudo = $consultas + $consultasd + $tratamento + $vacinas +
            $encaminhamento + $eO + $viagens;


        return view('Gerenciador.representantes', [
            'adm' => $adm,
            'sedes' => $sedes,
            'tudo' => $tudo,
            'pacientes' => $pacientes
        ]);
    }
    public function cadastrarSede(Request $request){

        $data = $request->all();
        Sede::create($data);
        return redirect('/gerente');
    }
}
