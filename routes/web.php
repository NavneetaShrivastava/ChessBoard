<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'BoardController@show_board_3')->name('Approach-3');
Route::get('/edit-colour', 'BoardController@update')->name('edit-colour');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/Approach-2', 'BoardController@show_board_2')->name('Approach-2');
Route::get('/Approach-1', 'BoardController@show_board_1')->name('Approach-1');
Route::get('/Approach-3', 'BoardController@show_board_3')->name('Approach-3');
