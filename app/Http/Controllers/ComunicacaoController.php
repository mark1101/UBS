<?php

namespace App\Http\Controllers;

use App\Recado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComunicacaoController extends Controller
{
    public function index(){
        return view('Usuario.comunicacao');
    }

    public function cadastraRecado(Request $request){
        $data = $request->all();

        $data['origem'] = Auth::user()->localidade;

        Recado::create($data);
    }
}
