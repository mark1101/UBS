<?php

namespace App\Http\Controllers;

use App\Exame;
use Illuminate\Http\Request;

class ExameController extends Controller
{
    public function indexbuscarExame(){
        return view('Usuario.buscarExame');
    }
    public function indexcadastroExame(){
        return view('Usuario.cadastroExame');
    }
    public function indexsolicitacaoExame(){
        return view('Usuario.solicitacaoExame');
    }
    public function cadastraExame(Request $request){
        $data = $request->all();
        Exame::create($data);
        return redirect('/cadastroExame');
    }
    public function cadastraSolicitacaoExame(Request $request){
        $data = $request->all();
        return redirect('/solicitacaoExame');
    }
}
