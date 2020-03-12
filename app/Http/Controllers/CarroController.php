<?php

namespace App\Http\Controllers;

use App\Carro;
use App\Localidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarroController extends Controller
{
    public function cadastraCarro(Request $request)
    {
        $data = $request->all();
        Carro::create($data);
    }
    public function indexbuscaCarro(){
        $carro = Carro::all();
        return view('Adm.cadastroCarro', [
            'carros' => $carro]);
    }
}
