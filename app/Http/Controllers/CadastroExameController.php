<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroExameController extends Controller
{
    public function index(){
        return view('cadastroExame');
    }
}
