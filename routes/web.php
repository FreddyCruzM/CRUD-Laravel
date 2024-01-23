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

use App\Http\Controllers\UserController;

//Listado de usuarios
Route::get('/','UserController@list');

//Formulario de usuarios
Route::get('/form', 'UserController@userform');

//Formulario de guardar usuarios
Route::post('/save','UserController@save')->name('save');