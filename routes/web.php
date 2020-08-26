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

Route::any('game/search', 'GameController@search')->name('game.search');

Route::get('/', function () {
    return redirect()->route('game.index');
});

Route::resource('game', 'GameController');

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
