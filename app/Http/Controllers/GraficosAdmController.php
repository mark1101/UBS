<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\ConsultaDentista;
use App\Encaminhamento;
use App\FichaTratamento;
use App\Localidade;
use App\Motorista;
use App\Paciente;
use App\User;
use App\Vacina;
use App\Viagens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GraficosAdmController extends Controller
{
    public function index()
    {
        $enfermeiro = User::where('cidade_sede', Auth::user()->cidade_sede)
            ->where('funcao', 'Enfermagem')
            ->count();

        $medico = User::where('cidade_sede', Auth::user()->cidade_sede)
            ->where('funcao', 'Medicina')
            ->count();

        $agente = User::where('cidade_sede', Auth::user()->cidade_sede)
            ->where('funcao', 'Agente de Saúde')
            ->count();

        $recepcao = User::where('cidade_sede', Auth::user()->cidade_sede)
            ->where('funcao', 'Recepcao')
            ->count();

        $dentista = User::where('cidade_sede', Auth::user()->cidade_sede)
            ->where('funcao', 'Odontologia')
            ->count();

        $motorista = Motorista::where('id_sede', Auth::user()->cidade_sede)
            ->count();


        // QUANTIDADE DE PACIENTE POR LOCALIDADE

        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();
        $paciente = Paciente::where('id_sede', Auth::user()->cidade_sede)->get();

        foreach ($localidades as $localidade) { //MOSTRA QUANTIDADE DE PACIENTES EM CADA LOCALIDADE
            $paciente[$localidade->id] = Paciente::where('id_localidade',
                $localidade->id)->count();
        }

        return view('Adm.graficoContador', [
            'enfermeiro' => $enfermeiro,
            'medico' => $medico,
            'agente' => $agente,
            'recepcao' => $recepcao,
            'dentista' => $dentista,
            'motorista' => $motorista,
            'localidades' => $localidades,
            'pacientes' => $paciente
        ]);
    }

    public function indexVacina()
    {
        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();

        $hoje = date('d-m-Y');

        $dias90 = date('d-m-Y', strtotime('-90 days', strtotime($hoje)));
        $dias60 = date('d-m-Y', strtotime('-60 days', strtotime($hoje)));
        $dias30 = date('d-m-Y', strtotime('-30 days', strtotime($hoje)));

        $mes1 = 0;
        $mes2 = 0;
        $mes3 = 0;

        $vacinas = Vacina::where('id_sede', Auth::user()->cidade_sede)->get();
        foreach ($vacinas as $item) {
            $teste = date('d-m-Y', strtotime($item->data));
            if (strtotime($teste) > strtotime($dias60)) {
                $mes1++;
            }if (strtotime($teste) > strtotime($dias90)) {
                if (strtotime($teste) < strtotime($dias30)) {
                    $mes2++;
                }
            }if (strtotime($teste) < strtotime($dias90)) {
                $mes3++;
            }
        }


        foreach ($localidades as $item) {
            $localidasCount[$item->nome] = Vacina::where('id_localidade', $item->id)->count();
        }

        $localidasCount = [];
        foreach ($localidades as $item) {
            $localidasCount[$item->nome] = Vacina::where('id_localidade', $item->id)->count();
        }
        return view('Adm.graficoVacina', [
            'localidades' => $localidasCount,
            'mes1' => $mes1,
            'mes2' => $mes2,
            'mes3' => $mes3
        ]);
    }

    public function indexConsulta()
    {
        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();

        $hoje = date('d-m-Y');

        $dias90 = date('d-m-Y', strtotime('-90 days', strtotime($hoje)));
        $dias60 = date('d-m-Y', strtotime('-60 days', strtotime($hoje)));
        $dias30 = date('d-m-Y', strtotime('-30 days', strtotime($hoje)));

        $mes1 = 0;
        $mes2 = 0;
        $mes3 = 0;

        $consultas = Consulta::where('id_sede', Auth::user()->cidade_sede)->get();
        foreach ($consultas as $item) {
            $teste = date('d-m-Y', strtotime($item->data));
            if (strtotime($teste) > strtotime($dias60)) {
                $mes1++;
            }if (strtotime($teste) > strtotime($dias90)) {
                if (strtotime($teste) < strtotime($dias30)) {
                    $mes2++;
                }
            }if (strtotime($teste) < strtotime($dias90)) {
                $mes3++;
            }
        }

        $localidasCount = [];
        foreach ($localidades as $item) {
            $localidasCount[$item->nome] = Consulta::where('id_localidade', $item->id)->count();
        }
        return view('Adm.graficoConsulta', [
            'localidades' => $localidasCount,
            'mes1' => $mes1,
            'mes2' => $mes2,
            'mes3' => $mes3
        ]);
    }

    public function indexEncaminhamento()
    {
        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();

        $hoje = date('d-m-Y');

        $dias90 = date('d-m-Y', strtotime('-90 days', strtotime($hoje)));
        $dias60 = date('d-m-Y', strtotime('-60 days', strtotime($hoje)));
        $dias30 = date('d-m-Y', strtotime('-30 days', strtotime($hoje)));

        $mes1 = 0;
        $mes2 = 0;
        $mes3 = 0;

        $consultas = Encaminhamento::where('id_sede', Auth::user()->cidade_sede)->get();
        foreach ($consultas as $item) {
            $teste = date('d-m-Y', strtotime($item->created_at));
            if (strtotime($teste) > strtotime($dias60)) {
                $mes1++;
            }if (strtotime($teste) > strtotime($dias90)) {
                if (strtotime($teste) < strtotime($dias30)) {
                    $mes2++;
                }
            }if (strtotime($teste) < strtotime($dias90)) {
                $mes3++;
            }
        }

        $localidasCount = [];
        foreach ($localidades as $item) {
            $localidasCount[$item->nome] = Encaminhamento::where('id_localidade', $item->id)->count();
        }
        return view('Adm.graficoEncaminhamento', [
            'localidades' => $localidasCount,
            'mes1' => $mes1,
            'mes2' => $mes2,
            'mes3' => $mes3
        ]);
    }

    public function indexViagem()
    {
        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();

        $localidasCount = [];
        foreach ($localidades as $item) {
            $localidasCount[$item->nome] = Viagens::where('id_origem', $item->id)->count();
        }
        return view('Adm.graficoViagem', [
            'localidades' => $localidasCount
        ]);

    }

    public function indexOdontologiaGeral()
    {
        $localidades = Localidade::where('id_sede', Auth::user()->cidade_sede)->get();

        $localidasConsultaCount = [];
        foreach ($localidades as $item) {
            $localidasConsultaCount[$item->nome] = ConsultaDentista::where('id_localidade', $item->id)->count();
        }

        $localidasTratamentoCount = [];
        foreach ($localidades as $item) {
            $localidasTratamentoCount[$item->nome] = FichaTratamento::where('id_localidade', $item->id)->count();
        }

        $dentistas = User::where('cidade_sede', Auth::user()->cidade_sede)
            ->where('funcao', 'Odontologia')
            ->get();

        $profissionais = [];
        $count = 0;
        foreach ($dentistas as $item) {
            $profissionais[$count]['data'] = $item;
            $profissionais[$count]['count'] = ConsultaDentista::where('id_profissional', $item->id)->count();
            $comunidade = Localidade::where('id', $item->localidade)->get();
            foreach ($comunidade as $local) {
                $profissionais[$count]['localidade'] = $local;
            }
            $count++;
        }

        $profissionaisT = [];
        $countt = 0;
        foreach ($dentistas as $item) {
            $profissionaisT[$countt]['data'] = $item;
            $profissionaisT[$countt]['count'] = FichaTratamento::where('id_profissional', $item->id)->count();
            $comunidade = Localidade::where('id', $item->localidade)->get();
            foreach ($comunidade as $local) {
                $profissionaisT[$countt]['localidade'] = $local;
            }
            $countt++;
        }

        $pacientes = Paciente::where('id_sede', Auth::user()->cidade_sede)->get();
        $faixa1 = [];
        $faixa2 = [];
        $faixa3 = [];
        foreach ($pacientes as $p) {
            if ($p->idade > 0 && $p->idade <= 15) {
                $faixa1[] = $p;
            } else if ($p->idade > 10 && $p->idade < 30) {
                $faixa2[] = $p;
            } else {
                $faixa3[] = $p;
            }
        }

        return view('Adm.graficoOdontologia', [
            'consultas' => $localidasConsultaCount,
            'tratamentos' => $localidasTratamentoCount,
            'proC' => $profissionais,
            'proT' => $profissionaisT,
            'faixa1' => count($faixa1),
            'faixa2' => count($faixa2),
            'faixa3' => count($faixa3)
        ]);


    }
}
