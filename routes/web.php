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
/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/', 'PublicController@showHomePage')->name('home');
Route::get('/listaEventi', 'PublicController@showEventsList')->name('list');
Route::post('/listaEventi', 'PublicController@showEventsListFiltered')->name('list.search');
Route::get('/listaEventi/Evento/{eventId}', 'PublicController@showEvent')->name('event');
Route::get('/info', 'PublicController@showInfo')->name('info');

//login
Route::get('login', 'Auth\LoginController@showLoginForm')
    ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
    ->name('logout');

//registrazione
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
    ->name('register');

Route::post('register', 'Auth\RegisterController@register');

Route::get('/user', 'UserController@index')->name('user')->middleware('can:isUser');

//acquisto
Route::get('/listaEventi/Evento/{eventId}/Acquista', 'UserController@showPurchaseScreen')->name('buy')->middleware('can:isUser');
Route::post('buy', 'UserController@buy')->middleware('can:isUser');
Route::get('/RiepilogoAcquisto', 'UserController@showRiepilogo')->name('riepilogo')->middleware('can:isUser');

//Areariservata
Route::get('/areriservata/user', 'UserController@AreaRiservata')->name('areariservata.user')->middleware('can:isUser');

Route::get('/areriservata/org', 'OrgController@AreaRiservata')->name('areariservata.org')->middleware('can:isOrg');

Route::get('/areriservata/admin', 'AdminController@AreaRiservata')->name('areariservata.admin')->middleware('can:isAdmin');

//Cronologia acquisti
Route::get('/areariservata/CronologiaAcquisti', 'UserController@CronologiaAcquisti')->name('cronologiaAcquisti')->middleware('can:isUser');
