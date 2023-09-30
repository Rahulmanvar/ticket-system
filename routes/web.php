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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'TicketController@index')->name('home');
    Route::get('/tickets', 'TicketController@index')->name('tickets');
    Route::post('/ticket/view', 'TicketController@view')->name('ticket.view');
    Route::get('/ticket/create', 'TicketController@create')->name('ticket.create');
    Route::post('/ticket/store', 'TicketController@store')->name('ticket.store');
    Route::post('/ticket/status', 'TicketController@status')->name('ticket.status');
});
