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
Route::get('/listaEventi', 'PublicController@showEventsList') -> name('list');
Route::post('/listaEventi', 'PublicController@showEventsListFiltered') -> name('list.search');
Route::get('/listaEventi/Evento/{eventId}', 'PublicController@showEvent') -> name('event');
//Route::get('/Evento/{eventId}','PublicController@showEvent') -> name('event'); non so se serve...
Route::get('/info', 'PublicController@showInfo') -> name('info');