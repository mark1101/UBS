<?php

namespace App\Http\Controllers;

use App\ConsultaDentista;
use App\Dentista;
use App\FichaTratamento;
use App\Localidade;
use App\Paciente;
use App\SolicitacaoExameOdonto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function indexSolicitacaoExame()
    {
        $paciente = Paciente::all();
        $localidade = Localidade::all();

        return view('Dentista.solicitacaoExameOdonto' , [
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
        $data['id_profissional'] = Auth::user()->id;

        ConsultaDentista::create($data);

        return redirect('/odonto/consulta');
    }
    public function cadastraTratamentoDentista(Request $request){
        $data = $request->all();
        $data['id_profissional'] = Auth::user()->id;

        FichaTratamento::create($data);

        return redirect('/fichaTratamento');
    }

    public function cadastraSolicitacaoExame(Request $request)
    {
        $data = $request->all();
        $data['id_profissional'] = Auth::user()->id;

        SolicitacaoExameOdonto::create($data);

        return redirect('/solicitacaoExameOdonto');
    }
}
