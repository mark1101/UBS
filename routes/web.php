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

/*Route::get('/', function () {
    return redirect('/login');
});*/

Auth::routes();
Route::group(['middleware' => ['web', 'auth']], function (){
    Route::get('/', function (){
        return redirect('/home');
    });

    Route::get('/home', function (){
       if (Auth::user()->admin == 0){
           return redirect('/inicio');
           //return view('inicio');
       }else if(Auth::user()->admin == 1){
           return view('Adm.administrador');
       }else if(Auth::user()->admin == 2){
           return view('Dentista.administracaoDentista');
       }
    });
});


/*Route::get('/home', function (){
    return redirect('/inicio');
})->name('home');*/

// ROTAS DE PACIENTE
Route::get('/paciente', 'PacienteController@indexPaciente')->middleware('auth')->name('paciente');
Route::get('/buscaPaciente', 'PacienteController@indexbuscaPaciente')->middleware('auth')->name('buscaPaciente');
Route::get('/mostraPaciente', 'PacienteController@mostraPaciente')->middleware('auth')->name('mostraPaciente');
Route::POST('paciente/salvarPaciente', 'PacienteController@cadastraPaciente')->name('cadastraPaciente');

// ROTAS DE EXAMES
Route::get('/cadastroExame', 'ExameController@indexcadastroExame')->middleware('auth')->name('cadastroExame');
Route::get('/buscarExame', 'ExameController@indexbuscarExame')->middleware('auth')->name('buscarExame');
Route::get('/solicitarExame', 'ExameController@indexsolicitacaoExame')->middleware('auth')->name('solicitarExame');
Route::POST('/cadastrarExame', 'ExameController@cadastraExame')->name('cadastrarExame');

// ROTAS DE VACINAS
Route::get('/mostraVacina', 'VacinaController@mostraVacina')->middleware('auth')->name('mostraVacina');
Route::get('/cadastroVacina', 'VacinaController@index')->middleware('auth')->name('cadastroVacina');
Route::POST('vacina/cadastrarVacina', 'VacinaController@cadastraVacina')->name('cadastraVacina');

// ROTAS DE RECADOS
Route::get('/recado', 'RecadoController@index')->middleware('auth')->name('recado');
Route::get('/comunicacao', 'ComunicacaoController@index')->middleware('auth')->name('comunicacao');

// ROTAS DE ENCAMINHAMENTO
Route::get('/encaminhamento', 'EncaminhamentoController@index')->middleware('auth')->name('encaminhamento');

// ROTAS DE ADMINISTRACAO


// ROTAS DE ODONTOLOGIA
Route::get('/administracaoOdonto', 'DentistaController@indexAdm')->middleware('auth')->name('admOdonto');
Route::get('/odonto/consulta', 'DentistaController@indexConsulta')->middleware('auth')->name('cadastroConsultaOdonto');


// ROTAS DE GERAL
Route::get('/inicio', 'InicioController@index')->middleware('auth')->name('inicio');
Route::get('/login', 'LoginController@index')->name('login');
Route::get('/controleViagem', 'ViagemController@index')->middleware('auth')->name('controleViagem');










