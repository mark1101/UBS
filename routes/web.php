<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', function () {
        return redirect('/home');
    });

    Route::get('/home', function () {
        if (Auth::user()->admin == 0) {
            return redirect('/inicio');
        } else if (Auth::user()->admin == 1) {
            return view('Adm.administrador');
        } else if (Auth::user()->admin == 2) {
            return view('Dentista.administracaoDentista');
        } else if (Auth::user()->admin == 3) {
            return view('Agente.AdministracaoAgente');
        } else if (Auth::user()->admin == 10) {
            return redirect('/gerente');
        } else {
            return redirect()->back();
        }
    });
});


/*Route::get('/home', function (){
    return redirect('/inicio');
})->name('home');*/

Route::middleware(['auth'])->group(function () {

    Route::get('/inicio', 'InicioController@index')->name('inicio');

    Route::middleware(['gerenciadorAcess'])->group(function () {

        Route::get('/gerente', 'GerenciadorController@index')->name('gerente');
        Route::post('cadatraSede', 'GerenciadorController@cadastrarSede')->name('cadaSede');

        Route::get('/pedidos', 'PedidosController@index')->name('pedidos')->middleware('auth');
        Route::get('/recebimentos', 'RecebimentosController@index')->name('recebimentos')->middleware('auth');

    });

    Route::get('/paciente', 'PacienteController@indexPaciente')->name('paciente');
    Route::get('/buscaPaciente', 'PacienteController@indexbuscaPaciente')->name('buscaPaciente');
    Route::get('/mostraPaciente', 'PacienteController@mostraPaciente')->name('mostraPaciente');
    Route::POST('paciente/salvar', 'PacienteController@cadastraPaciente')->name('cadastraPaciente');
    Route::POST('paciente/buscaPaciente', 'PacienteController@cadastraPaciente')->name('cadastraPaciente');
    Route::post('/buscaPaciente', 'PacienteController@buscaPaciente')->name('searchPaciente');
    Route::post('/editaPaciente/{id}', 'PacienteController@editaPaciente')->name('updatePaciente');
    Route::get('/puxaPaciente/{id}', 'PacienteController@puxaPaciente')->name('puxaPacinete');
    Route::get('historicoPaciente', 'historicoPacienteController@index')->name('historicoPaciente');
    Route::post('buscaHistorico', 'historicoPacienteController@buscaHistorico')->name('buscaHistorico');
    Route::get('/pacienteLocalidade/{id}', 'HistoricoPacienteController@buscaPacienteId')->name('buscaHPaciente');

    Route::middleware(['medicoEnfermeiroAcess'])->group(function () {

        Route::group(['prefix' => '/vacina'], function () {
            Route::get('/inicio', 'VacinaController@index')->name('indexVacina');
            Route::POST('/cadastra', 'VacinaController@cadastraVacina')->name('cadastraVacina');
            Route::get('/busca', 'VacinaController@searchVacina')->name('searchVacina');
        });

        Route::group(['prefix' => '/exame'], function () {
            Route::get('/cadastro', 'ExameController@indexcadastroExame')->name('cadastroExame');
            Route::get('/buscar', 'ExameController@indexbuscarExame')->name('buscarExame');
            Route::POST('/cadastrar', 'ExameController@cadastraExame')->name('cadastrarExame');

        });

        Route::post('tiraEntrada/{id}', 'FichaEntradaController@drop')->name('confirmaAtendimento');

        Route::get('/consultaCadastro', 'ConsultaController@indexConsulta')->name('consultaCadastro');
        Route::POST('/consulta/cadastro', 'ConsultaController@cadastroConsulta')->name('cadastroConsulta');
        Route::get('/mostraConsulta', 'ConsultaController@mostraConsulta')->name('mostraConsulta');
        Route::get('/buscaConsulta', 'ConsultaController@buscaConsulta')->name('searchConsulta');

    });


    Route::middleware(['recadoAcess'])->group(function () {

        Route::get('/recado', 'RecadoController@index')->name('recado');
        Route::get('/comunicacao', 'ComunicacaoController@index')->name('comunicacao');
        Route::post('/cadastraRecado', 'RecadoController@cadastraRecado')->name('storeRecado');

        Route::get('/cadastroTratamento', 'TratamentoPacienteController@index')->name('tratamentoPacienteAntes');
        Route::post('tratamentoCadastro', 'TratamentoPacienteController@cadastro')->name('trataPaciente');

        Route::get('mostraEntrada', 'FichaEntradaController@mostra')->name('mostraEntrada');
    });

    Route::middleware(['medicoAcess'])->group(function () {

        Route::get('/solicitar', 'ExameController@indexsolicitacaoExame')->name('solicitarExame');
        Route::POST('nova-solicitacao', 'ExameController@cadastraSolicitacaoExame')->name('cadastraSolicitacao');
        Route::get('pdfSolicitacao', 'ExameController@pdfSolicitacao')->name('pdfSolicitacao');

        Route::get('/encaminhamento', 'EncaminhamentoController@index')->name('encaminhamento');
        Route::post('/cadastrouEncaminhamento', 'EncaminhamentoController@cadastroEncaminhamento')->name('storeEnxaminhamento');
        Route::get('/pdfEncaminhamento', 'EncaminhamentoController@createPdf')->name('createPdfEncaminhamento');
        Route::get('/solicitaAtestado', 'AtestadoMedicoController@index')->name('atestadoMedico');
        Route::post('/pdfAtestadoCreate', 'AtestadoMedicoController@create')->name('atestado');
        Route::get('/pdfAtestado', 'AtestadoMedicoController@createPdf')->name('createPdf');
    });

    Route::middleware(['adminAcess'])->group(function () {

        Route::get('/cadastroMotorista', 'ViagemController@indexMotorista')->name('cadastroMotorista');
        Route::post('/cadastrouMotorista', 'ViagemController@cadastroMotorista')->name('storeMotorista');
        Route::post('/cadastrouCarro', 'ViagemController@cadastroCarro')->name('storeCarro');
        Route::get('/cadastroLocalidade', 'LocalidadeController@indexCadastroLocalidade')->name('cadastroLocalidade');
        Route::post('/cadastrouLocalidade', 'LocalidadeController@cadastroLocalidade')->name('storeLocalidade');
        Route::post('/cadastrouSede', 'LocalidadeController@cadastroSede')->name('storeSede');
        Route::get('/cadastraProfissional', 'ProfissionalController@indexProfissional')->name('cadastraProfissional');
        Route::post('/editaProfissional/{id}', 'ProfissionalController@alteraProfissional')->name('alteraProfissional');
        Route::post('/cadastrouProfissional', 'ProfissionalController@cadastroProfissional')->name('storeProfisional');
        Route::get('/grafico', 'GraficosAdmController@index')->name('graficos');
        Route::get('/grafico/vacina', 'GraficosAdmController@indexVacina')->name('graficoVacina');
        Route::get('/grafico/consulta', 'GraficosAdmController@indexConsulta')->name('graficoConsulta');
        Route::get('/grafico/encaminhamento', 'GraficosAdmController@indexEncaminhamento')->name('graficoEncaminhamento');
        Route::get('/grafico/viagem', 'GraficosAdmController@indexViagem')->name('graficoViagem');
        Route::get('/grafico/geralOdonto', 'GraficosAdmController@indexOdontologiaGeral')->name('graficoOdonto');

        Route::get('/recadosAdm', 'ComunicacaoAdmController@indexRecadoAdm')->name('recadoAdm');
        Route::get('/comunicacaoAdm', 'ComunicacaoAdmController@indexComunicacaoAdm')->name('comunicacaoAdm');
        Route::get('/buscaProfissional/{id}', 'ComunicacaoAdmController@buscaProfissionais')->name('buscaPro');

        Route::get('/problemaVisita', 'FichaVisitaController@mostraProblema')->name('mostraProblema');

        Route::get('/veOdontologico', 'veOdontologicoController@index')->name('veOdontologico');
        Route::get('/veConsultas', 'veConsultasController@index')->name('veConsultas');
        Route::get('/veProfissionais', 'veProfissionaisController@index')->name('veProfissionais');
        Route::get('/veVacinas', 'veVacinasController@index')->name('veVacinas');
        Route::get('/vePro', 'veProfissionaisController@mostraProfissional')->name('searchProfissional');
        Route::get('/veViagens', 'veViagensController@index')->name('veViagens');
        Route::get('/veEncaminhamentos', 'veEncaminhamentosController@index')->name('veEncaminhamento');
        Route::get('/veExames', 'veExamesController@index')->name('veExames');
        Route::post('/mostraViagem', 'veViagensController@mostraViagem')->name('mostraViagem');

        Route::get('/gerenciaMotorista', 'ViagemController@indexGeMotorista')->name('gerenciaMoto');
        Route::get('alteraMoto', 'ViagemController@gerenciaMotorista')->name('gerenc');
        Route::post('/editaMotorista/{id}', 'ViagemController@alteraMotorista')->name('alteraMotorista');

    });

    Route::middleware(['odontoAcess'])->group(function () {

        Route::get('/administracaoOdonto', 'DentistaController@indexAdm')->name('admOdonto');
        Route::get('/odonto/consulta', 'DentistaController@indexConsulta')->name('cadastroConsultaOdonto');
        Route::get('/solicitacaoExameOdonto', 'DentistaController@indexSolicitacaoExame')->name('solicitacaoExameOdonto');
        Route::get('/agendaDentista', 'FullCalendarController@index')->name('agendaDentista');
        Route::get('/load-events', 'EventController@loadEvents')->name('routeLoadEvents');
        Route::get('/fichaTratamento', 'DentistaController@indexTratamento')->name('tratamentoOdonto');

        Route::put('/event-update', 'EventController@altera')->name('routeEventUpdate');
        Route::get('/pacienteOdonto', 'PacienteOdontoController@mostraPacienteOdonto')->name('showPaciente');
        Route::post('/mostrandoPacienteOdonto', 'PacienteOdontoController@buscaPacienteOdonto')->name('odontoPaciente');
        Route::get('/dadosDentista', 'DentistaController@indexOdontologico')->name('odontologico');

        Route::POST('/event-store', 'EventController@cadastra')->name('routeEventStore');
        Route::POST('/cadastroEvento', 'EventController@cadastroEvento')->name('cadastroEvento');
        Route::POST('/cadatrouConsultaOdonto', 'DentistaController@cadastraConsultaDentista')->name('storeConsultaOdonto');
        Route::POST('/cadastrouficha', 'DentistaController@cadastraTratamentoDentista')->name('storeTratamentoOdonto');
        Route::post('/cadastrouSolicitacao', 'DentistaController@cadastraSolicitacaoExame')->name('storeSolicitacaoExameOdonto');

        Route::get('/recadoDentista', 'DentistaController@indexRecadoDentista')->name('indexRecadoOdonto');
        Route::get('/comunicacaoDentista', 'DentistaController@indexComunicacaoDentista')->name('indexComunicacaoDentista');
        Route::post('/cadastrouRecado', 'DentistaController@cadastraRecadoDentista')->name('cadastraRecadoOdonto');

        Route::get('/atestadoOdontologico', 'AtestadoMedicoController@indexDentista')->name('atestadoOdonto');

        Route::get('/encaminhamentoOdonto', 'DentistaController@encaminhamentoIndex')->name('encaminhamentoOdonto');
        Route::post('cadastraEncaminhamento', 'DentistaController@cadastraEncaminhamento')->name('cadastraEncaminhamentoD');

        Route::get('historicoPacienteOdonto', 'DentistaController@indexHistorico')->name('historicoOdonto');
        Route::get('/hisPaciente/{id}', 'DentistaController@buscaPacienteHistorico')->name('historyOdonto');
        Route::post('/historicoOdontoPaciente', 'DentistaController@buscaHistorico')->name('histoPa');

        Route::get('pdf', 'DentistaController@pdfTratamento')->name('pdfTratamento');
        Route::get('pdf2', 'DentistaController@pdfConsulta')->name('pdfConsulta');
        Route::get('pdf3', 'DentistaController@pdfExame')->name('pdfExame');
        Route::get('pdf4', 'DentistaController@pdfEncaminhamento')->name('pdfEncaminamentoOdonto');

    });

    Route::middleware(['agenteAcess'])->group(function () {

        Route::get('/agente/cadastroPaciente', 'AgenteController@indexcadastraPaciente')->name('cadastroPacienteAgente');
        Route::get('/homeAgente', 'AgenteController@indexAdmAgente')->name('admAgente');
        Route::get('recados/agente', 'AgenteController@recadoAgente')->name('recadoAgente');
        Route::get('/buscaPaciente', 'AgenteController@indexBuscaPaciente')->name('AgenteBuscaPaciente');
        Route::get('/buscaPacienteAgente', 'AgenteController@mostraPacienteAgente')->name('buscaPacienteAgente');
        Route::get('/comunicacaoAgente', 'AgenteController@comunicacaAgente')->name('comunicacaoAgente');
        Route::post('/cadastraRecadoAgente', 'AgenteController@cadastraRecadoAgente')->name('storeRecadoAgente');
        Route::get('/ficha', 'FichaVisitaController@indexVisita')->name('cadastroFicha');
        Route::post('cadastraFicha', 'FichaVisitaController@cadastraFicha')->name('cadastrouFicha');
        Route::get('/buscaVisita', 'FichaVisitaController@indexBuscaFicha')->name('buscaVisita');
        Route::get('buscaFicha', 'FichaVisitaController@buscaFicha')->name('buscaFichaVisita');
        Route::post('alteraFicha/{id}', 'FichaVisitaController@alteraFicha')->name('alteraficha');

    });

    Route::middleware(['recepcaoAcess'])->group(function () {

        Route::post('/cadastrouViagem', 'ViagemController@cadastroViagem')->name('storeViagem');
        Route::get('/confirmaViagem', 'ViagemController@indexConfirma')->name('confirmaViagem');
        Route::get('buscaViagem', 'ViagemController@buscaViagens')->name('buscaViagemNao');
        Route::post('alteraViagem/{id}', 'ViagemController@alteraViagem')->name('alteraViagem');
        Route::post('confirma/{id}', 'ViagemController@confirmaViagem')->name('confirmacaoviagem');
        Route::get('/controleViagem', 'ViagemController@index')->name('controleViagem');
        Route::get('/agendamentoDentista', 'DentistaController@agendamentoDentista')->name('agendamentoDentista');

        Route::post('entrada', 'FichaEntradaController@store')->name('storeEntrada');

    });

});

// ROTAS DO SITE

Route::get('/inicioSite', 'InicioSiteController@index')->name('siteInicio');
Route::get('/sobre', 'SobreController@index')->name('sobre');
Route::get('/cadastro', 'CadastroMunicipioController@index')->name('cadastro');
Route::get('/contato', 'ContatoController@index')->name('contato');


Route::post('pedido', 'CadastroMunicipioController@cadastro')->name('cadastroPedido');
Route::post('contato', 'ContatoController@cadastro')->name('contatoCadastro');

Route::get('/login', 'LoginController@index')->name('login');
