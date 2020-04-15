<?php

namespace App\Http\Controllers;

use App\Localidade;
use App\Sede;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfissionalController extends Controller
{
    public function indexProfissional(){

        $sedeUser = Auth::user()->cidade_sede;
        $localidade = Localidade::where('id_sede', $sedeUser)->get();


        return view('Adm.cadastroProfissionais' , ['localidades' => $localidade]);
    }
    public function cadastroProfissional(Request $request){

        $data = $request->all();


        $data['password'] = Hash::make($data['password']);
        $data['controle_acesso'] = 0;
        $data['admin'] = 0;


        if($data['funcao'] == 'Recepcao'){
            $data['controle_acesso'] = 4;
        }else if($data['funcao'] == 'Medicina' || $data['funcao'] == 'Enfermagem'){
            $data['controle_acesso'] = 2;
        }else if($data['funcao'] == 'Odontologia'){
            $data['admin'] = 2;
        }else if($data['funcao'] == 'Agente de Saúde'){
            $data['admin'] = 3;
        }

        $data['cidade_sede'] = Auth::user()->cidade_sede;

        User::create($data);
        return redirect('/cadastraProfissional');
    }
}
