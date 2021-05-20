<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

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

Route::get('/', [PublicController::class,'showHomePage']) -> name('home');
Route::get('/listaEventi', [PublicController::class,'showEventsList']) -> name('list');
Route::post('/listaEventi', [PublicController::class,'showEventsListFiltered']) -> name('list.search');
Route::get('/listaEventi/Evento/{eventId}', [PublicController::class,'showEvent']) -> name('event');
//Route::get('/Evento/{eventId}','PublicController@showEvent') -> name('event'); non so se serve...
Route::get('/info', [PublicController::class,'showInfo']) -> name('info');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
