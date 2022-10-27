<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Logout;

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
    return view('welcome');
});



Route::group(['namespace' => 'App\Http\Controllers'], function() { // GROUP 1
    Route::resource('/comments', 'CommentController')->only('store', 'update', 'destroy');
    Route::get('/login', 'LoginController@login')->name('login');
    Route::post('/login', 'LoginController@authenticate')->name('authenticate');

    Route::get('/tickets/search', 'TicketController@search')->name('tickets.search');
    Route::get('/tickets/create', 'TicketController@create')->name('tickets.create');
    Route::post('/tickets', 'TicketController@store')->name('tickets.store');
    Route::get('/tickets/{ticket}', 'TicketController@show')->name('tickets.show');

    Route::resource('/comments', 'CommentController')->only('store', 'update', 'destroy');

    Route::middleware(['auth'])->group(function() { // GROUP 2
        Route::get('/tickets', 'TicketController@index')->name('tickets.index');
        Route::get('/logout', 'LoginController@logout')->name('logout');
    });
});


// Route::resource('/tickets', 'App\Http\Controllers\TicketController');