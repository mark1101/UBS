<?php

namespace App\Http\Controllers;

use App\ConsultaDentista;
use App\Dentista;
use App\FichaTratamento;
use App\Localidade;
use App\Paciente;
use Illuminate\Http\Request;

class DentistaController extends Controller
{
    public function indexAdm()
    {
        return view('Dentista.administracaoDentista');
    }

    public function indexConsulta()
    {
        $paciente = Paciente::all();
        $localidade = Localidade::all();
        return view('Dentista.cadastroConsultaOdonto' , [
            'pacientes' => $paciente ,
            'localidades' => $localidade
        ]);
    }
    public function indexTratamento(){
        $paciente = Paciente::all();
        $localidade = Localidade::all();

        return view('Dentista.fichaTratamento' , [
            'pacientes' => $paciente,
            'localidades' => $localidade
        ]);
    }
    public function agendamentoDentista(){ // FUNCAO USADA PELO RECEPCIONISTA

        $localidade = Localidade::all();
        $paciente = Paciente::all();
        // caso quiser passar alguma variavel para ca
        return view('Usuario.agendamentoDentista' ,
        ['localidades' => $localidade , 'pacientes' => $paciente]);
    }

    public function cadastraConsultaDentista(Request $request) // CADASTRAMENTO DE CONSULTA INICIAL
    {
        $data = $request->all();
        ConsultaDentista::create($data);

        return redirect('/odonto/consulta');
    }
    public function cadastraTratamentoDentista(Request $request){
        $data = $request->all();
        FichaTratamento::create($data);

        return redirect('/fichaTratamento');
    }
}
