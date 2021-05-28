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

Route::get('/', 'PublicController@showHomePage')->name('home');
Route::get('/listaEventi', 'PublicController@showEventsList')->name('list');
Route::post('/listaEventi', 'PublicController@showEventsListFiltered')->name('list.search');
Route::get('/listaEventi/Evento/{eventId}', 'PublicController@showEvent')->name('event');
Route::get('/info', 'PublicController@showInfo')->name('info');

//login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')
    ->name('logout');

//registrazione
Route::get('register', 'Auth\RegisterController@showRegistrationForm')
    ->name('register');

Route::post('register', 'Auth\RegisterController@register');

Route::get('/user', 'UserController@index')->name('user')->middleware('can:isUser');

Route::get('/org', 'OrgController@index')->name('org')->middleware('can:isOrg');

//acquisto
Route::get('/acquista/{eventId}', 'UserController@showPurchaseScreen')->name('purchase')->middleware('can:isUser')->middleware('can:buy,eventId');
Route::post('/compraBiglietti', 'UserController@buyTickets')->name('buy')->middleware('can:isUser');
Route::get('/RiepilogoAcquisto', 'UserController@showRiepilogo')->name('riepilogo')->middleware('can:isUser');

//partecipazione
Route::post('/partecipa/{eventId}', 'UserController@Participate')->name('participate')->middleware('can:isUser');
Route::post('/eliminapar/{eventId}', 'UserController@deletePart')->name('delPart')->middleware('can:isUser');

//Areriservata

Route::get('/areariservata/user', 'UserController@AreaRiservata')->name('areariservata.user')->middleware('can:isUser');
Route::get('/areariservata/org', 'OrgController@AreaRiservata')->name('areariservata.org')->middleware('can:isOrg');
Route::get('/areariservata/admin', 'AdminController@AreaRiservata')->name('areariservata.admin')->middleware('can:isAdmin');

//Cronologia acquisti
Route::get('/areariservata/user/CronologiaAcquisti', 'UserController@CronologiaAcquisti')->name('cronologiaAcquisti')->middleware('can:isUser');

//Cronologia eventi organizzati
Route::get('/areariservata/org/EventiOrganizzati', 'OrgController@EventiOrganizzati')->name('eventiorganizzati')->middleware('can:isOrg');

Route::get('delete/{evetId}', 'OrgController@EliminaEvento')->name('delete')->middleware('can:isOrg');

//Modifica Profilo
Route::get('ModificaProfilo', 'UserController@showModifyProfile')->name('ModificaProfilo')->middleware('can:isUser');
Route::post('modificaprofilo', 'UserController@ModifyProfile')->name('modificaprofilo')->middleware('can:isUser');

//Creazione e modifica eventi
Route::get("/areariservata/org/nuovoEvento", "OrgController@showNewEventScreen")->name('newEvent')->middleware('can:isOrg');
Route::post("storeNewEvent", "OrgController@addEvent")->name('addNewEvent')->middleware('can:isOrg');
