<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioSiteController extends Controller
{
    public function index()
    {
        return view('Site.index');
    }
}
