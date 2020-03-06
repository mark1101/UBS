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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', function (){
    return redirect('/inicio');
})->name('home');


Route::get('/paciente', 'PacienteController@index')->middleware('auth')->name('paciente');
Route::get('/cadastroExame', 'ExameController@indexcadastroExame')->middleware('auth')->name('cadastroExame');
Route::get('/buscarExame', 'ExameController@indexbuscarExame')->middleware('auth')->name('buscarExame');
Route::get('/cadastroVacina', 'VacinaController@index')->middleware('auth')->name('cadastroVacina');
Route::get('/encaminhamento', 'EncaminhamentoController@index')->middleware('auth')->name('encaminhamento');
Route::get('/comunicacao', 'ComunicacaoController@index')->middleware('auth')->name('comunicacao');
Route::get('/inicio', 'InicioController@index')->middleware('auth')->name('inicio');
Route::get('/recado', 'RecadoController@index')->middleware('auth')->name('recado');

Route::get('/login', 'LoginController@index')->middleware('auth')->name('login');

Route::get('/mostraVacina', 'VacinaController@mostraVacina')->middleware('auth')->name('mostraVacina');

Route::POST('paciente/salvarPaciente', 'PacienteController@cadastraPaciente')->name('cadastraPaciente')->middleware('auth');
Route::POST('vacina/cadastrarVacina', 'VacinaController@cadastraVacina')->name('cadastraVacina')->middleware('auth');
