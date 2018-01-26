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


//EDGAR
Route::resource('autor','AutorController')->middleware('auth');
Route::resource('tema', 'TemaController')->middleware('auth');
Route::resource('eje', 'EjeController')->middleware('auth');
//Routh::auth();
Route::get('/', function () {
    return view('index');
});
Route::get('logout', 'auth\LoginController@logout');

//YU




Route::resource('editor','EditorController')->middleware('auth');
Route::resource('paises', 'PaisesController')->middleware('auth');
Route::resource('institucion', 'InstitucionController')->middleware('auth');



//Jair

Route::resource('ponencia', 'PonenciaController')->middleware('auth');
Route::resource('categoriaDocumento', 'CategoriaDocumentoController')->middleware('auth');
Route::resource('documento', 'DocumentoController')->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


