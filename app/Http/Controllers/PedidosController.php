<?php

namespace App\Http\Controllers;

use App\PedidoCadastro;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = PedidoCadastro::all();

        return view('Site.verPedidos' , [
            'pedidos' => $pedidos
        ]);
    }

}
