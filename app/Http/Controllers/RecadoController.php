<?php

namespace App\Http\Controllers;

use App\Recado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecadoController extends Controller
{
    public function index(){
        return view('Usuario.recado');
    }
    public function mostraRecado(){
        $recado = Recado::all();
        return view('Usuario.recado', [
            'recados' => $recado
        ]);
    }

}
