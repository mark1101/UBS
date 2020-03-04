<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroVacinaController extends Controller
{
    public function index(){
        return view('cadastroVacina');
    }
}
