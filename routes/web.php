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

        } else {
            return redirect()->back();
        }
    });
});


/*Route::get('/home', function (){
    return redirect('/inicio');
})->name('home');*/

// ROTAS DE PACIENTEmostraPaciente
Route::get('/paciente', 'PacienteController@indexPaciente')->middleware('auth')->name('paciente');
Route::get('/buscaPaciente', 'PacienteController@indexbuscaPaciente')->middleware('auth')->name('buscaPaciente');
Route::get('/mostraPaciente', 'PacienteController@mostraPaciente')->middleware('auth')->name('mostraPaciente');
Route::POST('paciente/salvar', 'PacienteController@cadastraPaciente')->name('cadastraPaciente');
Route::POST('paciente/buscaPaciente', 'PacienteController@cadastraPaciente')->name('cadastraPaciente');


// ROTAS DE EXAMES
Route::get('/cadastroExame', 'ExameController@indexcadastroExame')->middleware('auth')->name('cadastroExame');
Route::get('/buscarExame', 'ExameController@indexbuscarExame')->name('buscarExame');
Route::get('/solicitarExame', 'ExameController@indexsolicitacaoExame')->middleware('auth')->name('solicitarExame');
Route::POST('/cadastrarExame', 'ExameController@cadastraExame')->name('cadastrarExame');

// ROTAS DE VACINAS
Route::get('/mostraVacina', 'VacinaController@mostraVacina')->middleware('auth')->name('mostraVacina');
Route::POST('vacina/cadastrarVacina', 'VacinaController@cadastraVacina')->name('cadastraVacina');

// ROTAS DE RECADOS
Route::get('/recado', 'RecadoController@index')->middleware('auth')->name('recado');
Route::get('/comunicacao', 'ComunicacaoController@index')->middleware('auth')->name('comunicacao');
Route::post('/cadastraRecado', 'RecadoController@cadastraRecado')->middleware('auth')->name('cadastraRecado');

// ROTAS DE ENCAMINHAMENTO
Route::get('/encaminhamento', 'EncaminhamentoController@index')->middleware('auth')->name('encaminhamento');

// ROTAS DE ADMINISTRACAO


// ROTAS DE ODONTOLOGIA
Route::get('/administracaoOdonto', 'DentistaController@indexAdm')->middleware('auth')->name('admOdonto');
Route::get('/odonto/consulta', 'DentistaController@indexConsulta')->middleware('auth')->name('cadastroConsultaOdonto');

// ROTAS DE CONSULTA
Route::get('/consultaCadastro' , 'ConsultaController@indexConsulta')->middleware('auth')->name('consultaCadastro');
Route::POST('/consulta/cadastro' , 'ConsultaController@cadastroConsulta')->middleware('auth')->name('cadastroConsulta');

// ROTAS DE GERAL
Route::get('/inicio', 'InicioController@index')->middleware('auth')->name('inicio');
Route::get('/login', 'LoginController@index')->name('login');
Route::get('/controleViagem', 'ViagemController@index')->middleware('auth')->name('controleViagem');










