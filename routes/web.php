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
        } else {
            return redirect()->back();
        }
    });
});


/*Route::get('/home', function (){
    return redirect('/inicio');
})->name('home');*/

Route::middleware(['auth'])->group(function () {
// ROTAS DE PACIENTEmostraPaciente
    Route::get('/paciente', 'PacienteController@indexPaciente')->name('paciente');
    Route::get('/buscaPaciente', 'PacienteController@indexbuscaPaciente')->name('buscaPaciente');
    Route::get('/mostraPaciente', 'PacienteController@mostraPaciente')->name('mostraPaciente');
    Route::POST('paciente/salvar', 'PacienteController@cadastraPaciente')->name('cadastraPaciente');
    Route::POST('paciente/buscaPaciente', 'PacienteController@cadastraPaciente')->name('cadastraPaciente');


// ROTAS DE EXAMES
    Route::get('/cadastroExame', 'ExameController@indexcadastroExame')->name('cadastroExame');
    Route::get('/buscarExame', 'ExameController@indexbuscarExame')->name('buscarExame');
    Route::get('/solicitarExame', 'ExameController@indexsolicitacaoExame')->name('solicitarExame');
    Route::POST('/cadastrarExame', 'ExameController@cadastraExame')->name('cadastrarExame');

// ROTAS DE VACINAS
    Route::get('/mostraVacina', 'VacinaController@mostraVacina')->name('mostraVacina');
    Route::POST('vacina/cadastrarVacina', 'VacinaController@cadastraVacina')->name('cadastraVacina');

// ROTAS DE RECADOS
    Route::get('/recado', 'RecadoController@index')->name('recado');
    Route::get('/comunicacao', 'ComunicacaoController@index')->name('comunicacao');
    Route::post('/cadastraRecado', 'RecadoController@cadastraRecado')->name('cadastraRecado');

// ROTAS DE ENCAMINHAMENTO
    Route::get('/encaminhamento', 'EncaminhamentoController@index')
        ->name('encaminhamento');
    Route::post('/cadastrouEncaminhamento' , 'EncaminhamentoController@cadastroEncaminhamento')
        ->name('storeEnxaminhamento');

// ROTAS DE ADMINISTRACAO
    Route::get('/cadastroMotorista', 'ViagemController@indexMotorista')->name('cadastroMotorista');
    Route::post('/cadastrouMotorista', 'ViagemController@cadastroMotorista')->name('storeMotorista');
    Route::post('/cadastrouCarro', 'ViagemController@cadastroCarro')->name('storeCarro');
    Route::get('/cadastroLocalidade', 'LocalidadeController@indexCadastroLocalidade')->name('cadastroLocalidade');
    Route::post('/cadastrouLocalidade', 'LocalidadeController@cadastroLocalidade')->name('storeLocalidade');
    Route::post('/cadastrouSede', 'LocalidadeController@cadastroSede')->name('storeSede');
    Route::get('/cadastraProfissional' , 'ProfissionalController@indexProfissional')->name('cadastraProfissional');
    Route::post('/cadastrouProfissional' , 'ProfissionalController@cadastroProfissional')->name('storeProfisional');


// ROTAS DE ODONTOLOGIA
    Route::get('/administracaoOdonto', 'DentistaController@indexAdm')->name('admOdonto');
    Route::get('/odonto/consulta', 'DentistaController@indexConsulta')->name('cadastroConsultaOdonto');
    Route::get('/agendamentoDentista', 'DentistaController@agendamentoDentista')->name('agendamentoDentista');

// ROTAS DE CONSULTA
    Route::get('/consultaCadastro', 'ConsultaController@indexConsulta')->name('consultaCadastro');
    Route::POST('/consulta/cadastro', 'ConsultaController@cadastroConsulta')->name('cadastroConsulta');
    Route::get('/mostraConsulta', 'ConsultaController@mostraConsulta')->name('mostraConsulta');

// ROTAS DE GERAL
    Route::get('/inicio', 'InicioController@index')->name('inicio');
    //Route::get('/login', 'LoginController@index')->name('login');
    Route::get('/controleViagem', 'ViagemController@index')->name('controleViagem');

///////////// CALENDARIO DENTISTA //////////////
    Route::get('/agendaDentista', 'FullCalendarController@index')->name('agendaDentista');
    Route::get('/load-events', 'EventController@loadEvents')->name('routeLoadEvents');
    Route::put('/event-update', 'EventController@altera')->name('routeEventUpdate');
    Route::POST('/event-store', 'EventController@cadastra')->name('routeEventStore');
    Route::POST('/cadastroEvento', 'EventController@cadastroEvento')->name('cadastroEvento');

// ROTAS DE AGENTE DE SAUDE
    Route::get('/agente/cadastroPaciente', 'AgenteController@indexcadastraPaciente')->name('cadastroPacienteAgente');
    Route::get('/busca/paciente', 'AgenteController@mostraPacienteAgente')->name('mostraPacienteAgente');
    Route::get('/homeAgente', 'AgenteController@indexAdmAgente')->name('admAgente');
    Route::get('recados/agente', 'AgenteController@recadoAgente')->name('recadoAgente');

});

Route::get('/login', 'LoginController@index')->name('login');
