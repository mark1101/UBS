<?php

namespace App\Http\Controllers;

use App\Recado;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComunicacaoController extends Controller
{
    public function index(){
        $user = User::all();
        return view('Usuario.comunicacao' , [
            'profissionais' => $user
        ]);
    }
    public function cadastraRecado(Request $request){
        $data = $request->all();

        $data['origem'] = Auth::user()->localidade;

        Recado::create($data);
    }
}
