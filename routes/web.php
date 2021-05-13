<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});
 
 */

Route::get('/', 'PublicController@showHomePage') -> name('home');
Route::get('/listaEventi', 'PublicController@showEventsList') -> name('lista');
Route::get('/Evento/{eventId}', 'PublicController@showEvent') -> name('evento');
Route::get('/info', 'PublicController@showInfo') -> name('info');
