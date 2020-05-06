<?php

namespace App\Http\Controllers;

use App\Carro;
use App\Localidade;
use App\Motorista;
use App\Viagens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViagemController extends Controller
{
    public function index(){
        $motorista = Motorista::all();
        $carro = Carro::all();
        $localidade = Localidade::all();

        return view('Usuario.controleViagem' ,
        ['motoristas' => $motorista , 'carros' => $carro , 'localidades' => $localidade]);
    }

    public function indexConfirma()
    {
        $viagens = Viagens::where('id_sede', Auth::user()->cidade_sede)
            ->where('ativo', 1)
            ->orderBy('data', 'desc')
            ->get();
        return view('Usuario.confirmacaoViagem' ,[
            'viagens' => $viagens
        ]);
    }

    public function indexMotorista(){
        $localidade = Localidade::all();
        return view('Adm.cadastroMotorista', [
            'localidades' => $localidade
        ]);
    }
    public function cadastroMotorista(Request $request){
        $data = $request->all();
        $data['id_sede'] = Auth::user()->cidade_sede;
        Motorista::create($data);
        return redirect('/cadastroMotorista');
    }
    public function cadastroCarro(Request $request){

        $data = $request->all();
        $data['id_sede'] = Auth::user()->cidade_sede;
        Carro::create($data);
        return redirect('/cadastroMotorista');
    }
    public function cadastroViagem(Request $request){

        $data = $request->all();
        $data['id_sede'] = Auth::user()->cidade_sede;
        $data['id_origem'] = Auth::user()->localidade;
        $data['ativo'] = 1;

        Viagens::create($data);

        $response['success'] = true;
        echo json_encode($response);

        //return redirect('/controleViagem');
    }

    public function confirmaViagem(Request $request, $id){
        $data = $request->all();
        $data['ativo'] = 0;
        unset($data['_token']);
        Viagens::where('id', $id)->update($data);

        $response['success'] = true;
        $response['message'] = "Viagem editada com sucesso!";

        echo json_encode($response);

    }

    public function alteraViagem(Request $request, $id){
        $data = $request->all();
        unset($data['_token']);
        Viagens::where('id', $id)->update($data);

        $response['success'] = true;
        $response['message'] = "Viagem editada com sucesso!";

        echo json_encode($response);
    }

    public function buscaViagens(Request $request){

        $data = $request->all();
        unset($data['_token']);

        $data = Viagens::where('id_origem', Auth::user()->localidade)
            ->where('destino' , 'like' , '%' . $request->criterio . '%')
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
}
