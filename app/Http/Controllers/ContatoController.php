<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {
        return view('Site.contato');
    }

    public function cadastro(Request $request)
    {
        $data = $request->all();

        Contato::create($data);
        return redirect('/contato');
    }
}
