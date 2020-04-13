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
        $viagens = Viagens::where('id_origem', Auth::user()->localidade)
            ->where('ativo', 1)
            ->get();
        return view('Usuario.confirmacaoViagem' ,[
            'viagens' => $viagens
        ]);
    }

    public function mudaConfirma(){

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
        dd($data);
        $data['id_sede'] = Auth::user()->cidade_sede;

        Viagens::create($data);

        return redirect('/controleViagem');
    }
}
