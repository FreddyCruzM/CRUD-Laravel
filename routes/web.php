<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('usuarios.listar');
});

/*
|--------------------------------------------------------------------------
| Esta seria otra forma de poner la ruta del controlador:
|--------------------------------------------------------------------------
// Route::get('/form', 'UserController@userform'); 
*/


Route::get('/form', 'UserController@userform');
Route::post('/save','UserController@save')->name('save');