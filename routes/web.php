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
        }/*else if(Auth::user()->admin == 4){
            return view('Motorista.administracaoViagem');
        }*/ else {
            return redirect()->back();
        }
    });
});


/*Route::get('/home', function (){
    return redirect('/inicio');
})->name('home');*/

Route::middleware(['auth'])->group(function () {
// ROTAS DE PACIENTE
    Route::get('/paciente', 'PacienteController@indexPaciente')->name('paciente');
    Route::get('/buscaPaciente', 'PacienteController@indexbuscaPaciente')->name('buscaPaciente');
    Route::get('/mostraPaciente', 'PacienteController@mostraPaciente')->name('mostraPaciente');
    Route::POST('paciente/salvar', 'PacienteController@cadastraPaciente')->name('cadastraPaciente');
    Route::POST('paciente/buscaPaciente', 'PacienteController@cadastraPaciente')->name('cadastraPaciente');

    Route::post('/buscaPaciente', 'PacienteController@buscaPaciente')->name('searchPaciente');

    Route::post('/editaPaciente/{id}' , 'PacienteController@editaPaciente')->name('updatePaciente');

    Route::get('/puxaPaciente/{id}' , 'PacienteController@puxaPaciente')->name('puxaPacinete');


// ROTAS DE EXAMES
    Route::group(['prefix'=>'/exame'], function(){
        Route::get('/cadastro', 'ExameController@indexcadastroExame')->name('cadastroExame');
        Route::get('/buscar', 'ExameController@indexbuscarExame')->name('buscarExame');
        Route::get('/solicitar', 'ExameController@indexsolicitacaoExame')->name('solicitarExame');
        Route::POST('/cadastrar', 'ExameController@cadastraExame')->name('cadastrarExame');
    });


// ROTAS DE VACINAS

    Route::get('/vacina', 'VacinaController@index')->name('indexVacina');
    Route::POST('vacina/cadastrarVacina', 'VacinaController@cadastraVacina')->name('cadastraVacina');
    Route::get('/busca_Vacinas', 'VacinaController@searchVacina')->name('searchVacina');



// ROTAS DE RECADOS
    Route::get('/recado', 'RecadoController@index')->name('recado');
    Route::get('/comunicacao', 'ComunicacaoController@index')->name('comunicacao');
    Route::post('/cadastraRecado', 'RecadoController@cadastraRecado')->name('storeRecado');

// ROTAS DE ENCAMINHAMENTO
    Route::get('/encaminhamento', 'EncaminhamentoController@index')->name('encaminhamento');
    Route::post('/cadastrouEncaminhamento' , 'EncaminhamentoController@cadastroEncaminhamento')->name('storeEnxaminhamento');

    Route::get('/pdfEncaminhamento' , 'EncaminhamentoController@createPdf')->name('createPdfEncaminhamento');


// ROTAS DE ATESTADO MEDICO
    Route::get('/solicitaAtestado' , 'AtestadoMedicoController@index')->name('atestadoMedico');
    Route::post('/pdfAtestadoCreate' , 'AtestadoMedicoController@create')->name('atestado');

    Route::get('/pdfAtestado' , 'AtestadoMedicoController@createPdf')->name('createPdf');

// ROTAS DE ADMINISTRACAO
    Route::get('/cadastroMotorista', 'ViagemController@indexMotorista')
        ->name('cadastroMotorista');
    Route::post('/cadastrouMotorista', 'ViagemController@cadastroMotorista')
        ->name('storeMotorista');
    Route::post('/cadastrouCarro', 'ViagemController@cadastroCarro')
        ->name('storeCarro');
    Route::get('/cadastroLocalidade', 'LocalidadeController@indexCadastroLocalidade')
        ->name('cadastroLocalidade');
    Route::post('/cadastrouLocalidade', 'LocalidadeController@cadastroLocalidade')
        ->name('storeLocalidade');
    Route::post('/cadastrouSede', 'LocalidadeController@cadastroSede')
        ->name('storeSede');
    Route::get('/cadastraProfissional' , 'ProfissionalController@indexProfissional')
        ->name('cadastraProfissional');
    Route::post('/cadastrouProfissional' , 'ProfissionalController@cadastroProfissional')
        ->name('storeProfisional');
    Route::get('/graficos' , 'GraficosAdmController@index')->name('graficos');

    /////////// DADOS PARA VISU

    Route::get('/veOdontologico', 'veOdontologicoController@index')->name('veOdontologico');
    Route::get('/veConsultas', 'veConsultasController@index')->name('veConsultas');
    Route::get('/veProfissionais', 'veProfissionaisController@index')->name('veProfissionais');
    Route::get('/veVacinas', 'veVacinasController@index')->name('veVacinas');
    Route::get('/vePro', 'veProfissionaisController@mostraProfissional')->name('searchProfissional');
    Route::get('/veViagens', 'veViagensController@index')->name('veViagens');
    Route::post('/mostraViagem','veViagensController@mostraViagem')->name('mostraViagem');


// ROTAS DE CONSULTA

    Route::get('/consultaCadastro', 'ConsultaController@indexConsulta')->name('consultaCadastro');
    Route::POST('/consulta/cadastro', 'ConsultaController@cadastroConsulta')->name('cadastroConsulta');
    Route::get('/mostraConsulta', 'ConsultaController@mostraConsulta')->name('mostraConsulta');
    Route::get('/buscaConsulta', 'ConsultaController@buscaConsulta')->name('searchConsulta');

// ROTAS DE GERAL
    Route::get('/inicio', 'InicioController@index')->name('inicio');
    Route::get('/controleViagem', 'ViagemController@index')->name('controleViagem');

// ROTAS DE ODONTOLOGIA
    Route::get('/administracaoOdonto', 'DentistaController@indexAdm')->name('admOdonto');
    Route::get('/odonto/consulta', 'DentistaController@indexConsulta')->name('cadastroConsultaOdonto');
    Route::get('/agendamentoDentista', 'DentistaController@agendamentoDentista')->name('agendamentoDentista');
    Route::get('/solicitacaoExameOdonto', 'DentistaController@indexSolicitacaoExame')->name('solicitacaoExameOdonto');
    Route::get('/agendaDentista', 'FullCalendarController@index')->name('agendaDentista');
    Route::get('/load-events', 'EventController@loadEvents')->name('routeLoadEvents');
    Route::get('/fichaTratamento' ,'DentistaController@indexTratamento')->name('tratamentoOdonto');

    Route::put('/event-update', 'EventController@altera')->name('routeEventUpdate');
    Route::get('/pacienteOdonto', 'PacienteOdontoController@mostraPacienteOdonto')->name('showPaciente');
    Route::post('/mostrandoPacienteOdonto', 'PacienteOdontoController@buscaPacienteOdonto')->name('odontoPaciente');
    Route::get('/dadosDentista' , 'DentistaController@indexOdontologico')->name('odontologico');

    Route::POST('/event-store', 'EventController@cadastra')->name('routeEventStore');
    Route::POST('/cadastroEvento', 'EventController@cadastroEvento')->name('cadastroEvento');
    Route::POST('/cadatrouConsultaOdonto' , 'DentistaController@cadastraConsultaDentista')->name('storeConsultaOdonto');
    Route::POST('/cadastrouficha' , 'DentistaController@cadastraTratamentoDentista')->name('storeTratamentoOdonto');
    Route::post('/cadastrouSolicitacao' , 'DentistaController@cadastraSolicitacaoExame')->name('storeSolicitacaoExameOdonto');

    Route::get('/recadoDentista', 'DentistaController@indexRecadoDentista')->name('indexRecadoOdonto');
    Route::get('/comunicacaoDentista', 'DentistaController@indexComunicacaoDentista')->name('indexComunicacaoDentista');
    Route::post('/cadastrouRecado', 'DentistaController@cadastraRecadoDentista')->name('cadastraRecadoOdonto');

    //// GERACAO DE PDF
    Route::get('pdf', 'DentistaController@pdfTratamento')->name('pdfTratamento');
    Route::get('pdf2', 'DentistaController@pdfConsulta')->name('pdfConsulta');
    Route::get('pdf3', 'DentistaController@pdfExame')->name('pdfExame');

// ROTAS DE AGENTE DE SAUDE
    Route::get('/agente/cadastroPaciente', 'AgenteController@indexcadastraPaciente')->name('cadastroPacienteAgente');
    Route::get('/homeAgente', 'AgenteController@indexAdmAgente')->name('admAgente');
    Route::get('recados/agente', 'AgenteController@recadoAgente')->name('recadoAgente');

    Route::get('/buscaPaciente', 'AgenteController@indexBuscaPaciente')->name('AgenteBuscaPaciente');
    Route::get('/buscaPacienteAgente', 'AgenteController@mostraPacienteAgente')->name('buscaPacienteAgente');

    Route::get('/comunicacaoAgente', 'AgenteController@comunicacaAgente')->name('comunicacaoAgente');
    Route::post('/cadastraRecadoAgente', 'AgenteController@cadastraRecadoAgente')->name('storeRecadoAgente');


//ROTOAS DE VIAGENS
    Route::post('/cadastrouViagem', 'ViagemController@cadastroViagem')->name('storeViagem');
    Route::get('/confirmaViagem', 'ViagemController@indexConfirma')->name('confirmaViagem');

});

Route::get('/login', 'LoginController@index')->name('login');
