<?php

namespace App\Http\Controllers;

use App\Recado;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComunicacaoController extends Controller
{
    public function index()
    {

        $adm = User::where([
            ['cidade_sede', Auth::user()->cidade_sede],
            ['funcao', 'administrador'],
        ])->get();


        $user = User::where([
            ['localidade', Auth::user()->localidade],
            ['cidade_sede', Auth::user()->cidade_sede],
        ])->get();

        $juncao = [];
        foreach ($adm as $item){
            $juncao[] = $item;
        }

        foreach ($user as $valor){
            $juncao[] = $valor;
        }

        $pro = [];
        foreach ($juncao as $value){
            $pro[] = $value;
        }


        return view('Usuario.comunicacao', [
            'profissionais' => $pro
        ]);
    }
}
