<?php

namespace App\Http\Controllers;

use App\Exame;
use Illuminate\Http\Request;

class ExameController extends Controller
{
    public function indexbuscarExame(){
        return view('buscarExame');
    }
    public function indexcadastroExame(){
        return view('cadastroExame');
    }
    public function indexsolicitacaoExame(){
        return view('solicitacaoExame');
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
