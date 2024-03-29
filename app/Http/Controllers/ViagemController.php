<?php

namespace App\Http\Controllers;

use App\Carro;
use App\Localidade;
use App\Motorista;
use App\User;
use App\Viagens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViagemController extends Controller
{
    public function index()
    {
        $motorista = Motorista::all();
        $carro = Carro::all();
        $localidade = Localidade::all();

        return view('Usuario.controleViagem',
            ['motoristas' => $motorista, 'carros' => $carro, 'localidades' => $localidade]);
    }

    public function indexConfirma()
    {
        $viagens = Viagens::where('id_sede', Auth::user()->cidade_sede)
            ->where('ativo', 1)
            ->orderBy('data', 'desc')
            ->get();
        return view('Usuario.confirmacaoViagem', [
            'viagens' => $viagens
        ]);
    }

    public function indexMotorista()
    {
        $localidade = Localidade::all();
        return view('Adm.cadastroMotorista', [
            'localidades' => $localidade
        ]);
    }

    public function cadastroMotorista(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $response['errors']['cpf'] = "";

        if (Motorista::where('cpf', $data['cpf'])->count() > 0) {
            $response['success'] = false;
            $response['errors']['cpf'] = "CPF já cadastrado";
        } else {
            $data['id_sede'] = Auth::user()->cidade_sede;
            Motorista::create($data);
            $response['success'] = true;
        }
        echo json_encode($response);

    }

    public function cadastroCarro(Request $request)
    {

        $data = $request->all();
        unset($data['_token']);

        $data['id_sede'] = Auth::user()->cidade_sede;
        Carro::create($data);

        $response['success'] = true;
        echo json_encode($response);

    }

    public function cadastroViagem(Request $request)
    {

        $data = $request->all();
        $data['id_sede'] = Auth::user()->cidade_sede;
        $data['id_origem'] = Auth::user()->localidade;
        $data['ativo'] = 1;

        Viagens::create($data);

        $response['success'] = true;
        echo json_encode($response);

        //return redirect('/controleViagem');
    }

    public function confirmaViagem(Request $request, $id)
    {
        $data = $request->all();
        $data['ativo'] = 0;
        unset($data['_token']);
        Viagens::where('id', $id)->update($data);

        $response['success'] = true;
        $response['message'] = "Viagem editada com sucesso!";

        echo json_encode($response);

    }

    public function alteraViagem(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        Viagens::where('id', $id)->update($data);

        $response['success'] = true;
        $response['message'] = "Viagem editada com sucesso!";

        echo json_encode($response);
    }

    public function buscaViagens(Request $request)
    {

        $data = $request->all();
        unset($data['_token']);

        $data = Viagens::where('id_origem', Auth::user()->localidade)
            ->where('destino', 'like', '%' . $request->criterio . '%')
            ->where('ativo', 1)
            ->get();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['localidadeOrigem'] = ($data[$i]->localidadeOrigem)->nome;
        }
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['motorista'] = ($data[$i]->motorista)->nome;
        }

        $response['success'] = true;
        $response['data'] = $data;

        echo json_encode($response);
    }

    public function indexGeMotorista()
    {
       $data =  Motorista::where('id_sede', Auth::user()->cidade_sede)->with('localidade')->get();
       $localidade = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();

       return view('Adm.gerenciarMotoristas', [
          'data' => $data,
           'localidades' => $localidade
       ]);

    }

    public function gerenciaMotorista(Request $request)
    {
        $dataa = $request->all();
        unset($dataa['_token']);

        $cidade = Auth::user()->cidade_sede;

        $data = Motorista::where('id_sede', $cidade)
            ->where('nome', 'like', '%' . $request->criterio . '%')
            ->with('localidade')
            ->get();

        $response['success'] = true;
        $response['data'] = $data;

        echo json_encode($response);

    }
    public function alteraMotorista(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        Motorista::where('id', $id)->update($data);

        $response['success'] = true;
        $response['message'] = "Motorista editado com sucesso!";

        echo json_encode($response);
    }
}
