<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecadoController extends Controller
{
    public function index(){
        return view('recado');
    }
}
