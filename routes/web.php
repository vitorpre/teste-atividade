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
    return view('welcome');
});


Route::get('', 'AtividadeController@index');
Route::get('atividade/criar', 'AtividadeController@criar');
Route::post('atividade/salvar', 'AtividadeController@salvar');
Route::get('atividade/{atividade}/editar', 'AtividadeController@editar');
Route::post('atividade/{atividade}/salvar', 'AtividadeController@alterar');
Route::get('atividade/{atividade}/redirecionar', 'AtividadeController@redirecionarAposCriar');