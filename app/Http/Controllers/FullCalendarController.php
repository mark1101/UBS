<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fullcalendarController extends Controller
{
    public function index(){
        return view('Dentista.master');
    }
}
