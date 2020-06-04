<?php

namespace App\Http\Controllers;

use App\PedidoCadastro;
use Illuminate\Http\Request;

class CadastroMunicipioController extends Controller
{
    public function index()
    {
        return view('Site.cadastro');
    }

    public function cadastro(Request $request)
    {
        $data = $request->all();

        PedidoCadastro::create($data);

        return redirect('/cadastro');
    }
}
