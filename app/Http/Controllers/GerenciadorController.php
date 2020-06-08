<?php

namespace App\Http\Controllers;

use App\Sede;
use App\User;
use Illuminate\Http\Request;

class GerenciadorController extends Controller
{
    public function index()
    {
        $adm = User::where('funcao', 'administrador')
            ->with('localidade')
            ->get();

        $sedes = Sede::all();

        return view('Gerenciador.representantes', [
            'adm' => $adm,
            'sedes' => $sedes
        ]);
    }
    public function cadastrarSede(Request $request){

        $data = $request->all();
        Sede::create($data);
        return redirect('/gerente');
    }
}
