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
    return view('index');
});

//EDGAR
Route::resource('autor','AutorController');
Route::resource('tema', 'TemaController');
Route::resource('eje', 'EjeController');

//YU
Route::resource('editor','EditorController');
Route::resource('paises', 'PaisesController');
Route::resource('institucion', 'InstitucionController');

//Jair

Route::resource('ponencia', 'PonenciaController');
Route::resource('categoriaDocumento', 'CategoriaDocumentoController');





