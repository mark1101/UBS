<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use vendor\project\StatusTest;

class BuscarExameController extends Controller
{
    public function index(){
        return view('buscarExame');
    }
}
