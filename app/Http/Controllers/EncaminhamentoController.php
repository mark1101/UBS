<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncaminhamentoController extends Controller
{
    public function index(){
        return view('encaminhamento');
    }
}
