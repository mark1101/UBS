<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Localidade;
use App\Recado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecadoController extends Controller
{
    public function index(){

        $recado = Recado::where('destino' , Auth::user()->id)->get();

        return view('Usuario.recado' , [
            'rs' => $recado,
            'recados' => Recado::with(['localidade'])->get()
        ]);
    }
    public function mostraRecado(){

        $recado = Recado::all();
        return view('Usuario.recado', [
            'recados' => $recado
        ]);
    }

    public function cadastraRecado(Request $request)
    {
        $data = $request->all();
        $data['origem'] = Auth::user()->localidade;
        $data['mandante'] = Auth::user()->id;

        Recado::create($data);

        return redirect('/comunicacao');

    }

}
