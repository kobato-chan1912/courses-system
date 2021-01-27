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

Route::get('/', function () {
    return view('pages.home');
})->name('home');
//
Route::get('login', 'AuthController@GetLogin')->name('getLogin');
Route::post('login', 'AuthController@Login')->name('login');

Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('register', 'AuthController@getRegister')->name('getRegister');
Route::post('register', 'AuthController@register')->name('register');
