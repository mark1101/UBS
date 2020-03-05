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

Route::get('/paciente', function () {
    return view('paciente');
})->name('paciente')->middleware('auth');

Route::get('/buscarExame', function () {
    return view('buscarExame');
})->name('buscarExame')->middleware('auth');

Route::get('/cadastroExame', function () {
    return view('cadastroExame');
})->name('cadastroExame')->middleware('auth');

Route::get('/cadastroVacina', function () {
    return view('cadastroVacina');
})->name('cadastroVacina')->middleware('auth');

Route::get('/encaminhamento', function () {
    return view('encaminhamento');
})->name('encaminhamento')->middleware('auth');

Route::get('/recado', function () {
    return view('recado');
})->name('recado')->middleware('auth');

Route::get('/comunicacao', function () {
    return view('comunicacao');
})->name('comunicacao')->middleware('auth');

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio')->middleware('auth');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::POST('paciente/salvarPaciente', 'PacienteController@cadastraPaciente')->name('cadastraPaciente')->middleware('auth');
Route::POST('vacina/cadastrarVacinar', 'CadastroVacinaController@cadastraVacina')->name('cadastraVacina')->middleware('auth');
