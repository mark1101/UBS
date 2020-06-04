<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;

class RecebimentosController extends Controller
{
    public function index()
    {
        $contatos = Contato::all();
        return view('Site.verrecebimentosContato' , [
            'contatos'  => $contatos
        ]);
    }
}
