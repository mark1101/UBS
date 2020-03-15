<?php

namespace App\Http\Controllers;

use App\Carro;
use App\Localidade;
use App\Motorista;
use Illuminate\Http\Request;

class ViagemController extends Controller
{
    public function index(){
        $motorista = Motorista::all();
        $carro = Carro::all();
        $localidade = Localidade::all();

        return view('Usuario.controleViagem' ,
        ['motoristas' => $motorista , 'carros' => $carro , 'localidades' => $localidade]);
    }
    public function indexMotorista(){
        $localidade = Localidade::all();
        return view('Adm.cadastroMotorista', [
            'localidades' => $localidade
        ]);
    }
    public function cadastroMotorista(Request $request){
        $data = $request->all();
        Motorista::create($data);
        return redirect('/cadastroMotorista');
    }
    public function cadastroCarro(Request $request){

        $data = $request->all();
        Carro::create($data);
        return redirect('/cadastroMotorista');
    }
}
