<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViagemController extends Controller
{
    public function index(){
        return view('Usuario.controleViagem');
    }
}
