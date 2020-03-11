<?php

namespace App\Http\Controllers;

use App\Dentista;
use Illuminate\Http\Request;

class DentistaController extends Controller
{
    public function index()
    {
        return view('Dentista.administracaoDentista');
    }
    public function cadastraDentista(Request $request){
        $data = $request->all();
        Dentista::create($data);
    }
}
