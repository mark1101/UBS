<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function verificaLogin(Request $request)
    {
        $data = $request->all();

        $valores = [
            'email' => $request->email,
            'senha' => $request->senha
        ];
        if($request->email != 'admin@admin'){
            dd($request);
            return redirect('paciente');
        }
    }
}
