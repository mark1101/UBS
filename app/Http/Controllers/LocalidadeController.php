<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\ConsultaDentista;
use App\Encaminhamento;
use App\Exame;
use App\FichaTratamento;
use App\Localidade;
use App\Paciente;
use App\Sede;
use App\Vacina;
use App\Viagens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocalidadeController extends Controller
{
    public function cadastraLocalidade(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $response['errors']['localidade'] = "";

        if(Localidade::where('nome', $data['nome'])->count() > 0){
            $response['success'] = false;
            $response['errors']['localidade'] = "Localidade já cadastrada.";
        }else{
            $response['success'] = true;
            Localidade::create($data);
        }
        echo json_encode($response);
    }

    public function indexCadastroLocalidade()
    {
        $sede = Sede::where('id', Auth::user()->cidade_sede)->get();
        $localidades = Localidade::all();
        $paciente = Paciente::all();

        foreach ($localidades as $localidade) { //MOSTRA QUANTIDADE DE PACIENTES EM CADA LOCALIDADE
            $paciente[$localidade->id] = Paciente::where('id_localidade',
                $localidade->id)->count();
        }
        foreach ($localidades as $localidade) { //MOSTRA QUANTIDADE DE CONSULTAS
            $consulta[$localidade->id] = Consulta::where('id_localidade',
                $localidade->id)->count();
        }
        foreach ($localidades as $localidade) { //MOSTRA QUANTIDADE DE EXAMES
            $exame[$localidade->id] = Exame::where('comunidade_atendida',
                $localidade->id)->count();
        }
        foreach ($localidades as $localidade){ //MOSTRA QUANTIDADE DE VACINA
            $vacina[$localidade->id] = Vacina::where('id_localidade',
                $localidade->id)->count();
        }
        foreach ($localidades as $localidade){ //MOSTRA QUANTIDADE DE VIAGENS DE ORIGEM DA LOCALIDADE
            $viagem[$localidade->id] = Viagens::where('id_origem',
                $localidade->id)->count();
        }
        foreach ($localidades as $localidade){ //MOSTRA QUANTIDADE DE ENCAMINHAMENTOS
            $encaminhamento[$localidade->id] = Encaminhamento::where('id_localidade',
                $localidade->id)->count();
        }
        foreach ($localidades as $localidade){ //MOSTRA QUANTIDADE DE CONSULTAS ODONTOLOGICAS
            $consultaOdonto[$localidade->id] = ConsultaDentista::where('id_localidade',
                $localidade->id)->count();
        }
        foreach ($localidades as $localidade){ //MOSTRA QUANTIDADE DE TRATAMENTOS ODONTOLOGICOS
            $tratamentoOdonto[$localidade->id] = FichaTratamento::where('id_localidade',
                $localidade->id)->count();
        }

        $localidade = Localidade::where('id_sede', Auth::user()->cidade_sede)
            ->orderBy('nome')
            ->get();

        return view('Adm.cadastroLocalidade', [
            'sedes' => $sede,
            'localidades' => $localidade,
            'pacientes' => $paciente,
            'consultas' => $consulta,
            'exames' => $exame,
            'vacinas' => $vacina,
            'viagens' => $viagem,
            'encaminhamentos' => $encaminhamento,
            'consultaOdonto' => $consultaOdonto,
            'tratamentoOdonto' => $tratamentoOdonto

        ]);
    }

    public function cadastroSede(Request $request)
    {
        $data = $request->all();
        Sede::create($data);

        return redirect('/cadastroLocalidade');

    }

    public function cadastroLocalidade(Request $request)
    {
        $data = $request->all();
        $data['cidade_sede'] = Auth::user()->cidade_sede;

        unset($data['_token']);

        $response['errors']['localidade'] = "";

        if(Localidade::where('nome', $data['nome'])->count() > 0){
            $response['success'] = false;
            $response['errors']['localidade'] = "Localidade já cadastrada.";
        }else{
            $response['success'] = true;
            Localidade::create($data);
        }
        echo json_encode($response);
    }

}
