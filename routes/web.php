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
<<<<<<< HEAD
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

=======

Route::get('/', 'PublicController@showHomePage') -> name('home');
Route::get('/listaEventi', 'PublicController@showEventsList') -> name('list');
Route::post('/listaEventi', 'PublicController@showEventsListFiltered') -> name('list.search');
Route::get('/listaEventi/Evento/{eventId}', 'PublicController@showEvent') -> name('event');
Route::get('/info', 'PublicController@showInfo') -> name('info');

//login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
>>>>>>> 440335bac4add00b2b1a3ceec29be962ff24cf8a
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')
    ->name('logout');

//registrazione
<<<<<<< HEAD
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
    ->name('register');

Route::post('register', 'Auth\RegisterController@register');

Route::get('/user', 'UserController@index')->name('user')->middleware('can:isUser');

Route::get('/org', 'OrgController@index')->name('org')->middleware('can:isOrg');
=======
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('/user', 'UserController@index') ->name('user')->middleware('can:isUser');
>>>>>>> 440335bac4add00b2b1a3ceec29be962ff24cf8a

//acquisto
Route::get('/acquista/{eventId}', 'UserController@showPurchaseScreen')->name('purchase')->middleware('can:isUser');
Route::post('/compraBiglietti', 'UserController@buyTickets')->name('buy')->middleware('can:isUser');
Route::get('/RiepilogoAcquisto', 'UserController@showRiepilogo')->name('riepilogo')->middleware('can:isUser');

<<<<<<< HEAD
//Areariservata
Route::get('/areriservata/user', 'UserController@AreaRiservata')->name('areariservata.user')->middleware('can:isUser');
=======
//Areriservata
>>>>>>> 440335bac4add00b2b1a3ceec29be962ff24cf8a

Route::get('/areriservata/user', 'UserController@AreaRiservata')->name('areariservata.user')->middleware('can:isUser');
Route::get('/areriservata/org', 'OrgController@AreaRiservata')->name('areariservata.org')->middleware('can:isOrg');
Route::get('/areriservata/admin', 'AdminController@AreaRiservata')->name('areariservata.admin')->middleware('can:isAdmin');

//Cronologia acquisti
Route::get('/areariservata/CronologiaAcquisti', 'UserController@CronologiaAcquisti')->name('cronologiaAcquisti')->middleware('can:isUser');

//Cronologia eventi organizzati
Route::get('/areariservata/EventiOrganizzati', 'OrgController@EventiOrganizzati')->name('eventiorganizzati')->middleware('can:isOrg');

Route::get('delete/{evetId}', 'OrgController@EliminaEvento')->name('delete')->middleware('can:isOrg');
