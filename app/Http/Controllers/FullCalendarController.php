<?php

namespace App\Http\Controllers;

use App\Localidade;
use Illuminate\Http\Request;

class fullcalendarController extends Controller
{
    public function index(){

        $localidade = Localidade::all();
        return view('Dentista.master', ['localidades' => $localidade]);
    }
}
