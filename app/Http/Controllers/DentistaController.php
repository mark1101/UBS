<?php

namespace App\Http\Controllers;

use App\Dentista;
use Illuminate\Http\Request;

class DentistaController extends Controller
{
    public function indexAdm()
    {
        return view('Dentista.administracaoDentista');
    }

    public function indexConsulta()
    {
        return view('Dentista.cadastroConsultaOdonto');
    }
    public function cadastraDentista(Request $request)
    {
        $data = $request->all();
        Dentista::create($data);
    }
}
