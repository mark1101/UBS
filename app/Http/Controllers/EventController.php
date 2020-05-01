<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function loadEvents(){

        $events = Event::where('id_profissional', Auth::user()->id)->get();
        return response()->json($events);
    }
    public function cadastra(Request $request){
        Event::create($request->all());

        return response()->json(true);
    }
    public function altera(Request $request){
        $event = Event::where('id', $request->id)->first(); // pega o id para alterar
        $event->fill($request->all()); // puxa todos os dados de requisicao
        $event->save(); // salva tudo
        return response()->json(true);
    }

    public function cadastroEvento(Request $request)
    {

        $data = $request->all();
        $data['id_localidade'] = Auth::user()->localidade;

        Event::create($data);
        return redirect('/agendamentoDentista');
    }

}
