<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExameController extends Controller
{
    public function indexbuscarExame(){
        return view('buscarExame');
    }
    public function indexcadastroExame(){
        return view('cadastroExame');
    }

    public function cadastroExame(Request $request){

        $data = $request->all();

    }

}
