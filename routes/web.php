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

// Authentication.


Route::get('/', 'HomeController@getHome' );
//
Route::get('login', 'AuthController@GetLogin')->name('getLogin');
Route::post('login', 'AuthController@Login')->name('login');

Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('register', 'AuthController@getRegister')->name('getRegister');
Route::post('register', 'AuthController@register')->name('register');

Route::get('authorize', 'AuthController@authorization')->name('authorize');
Route::get('confirm', 'AuthController@confirmAuthorize')->name('confirm_authorize');

Route::get('forgot', 'AuthController@getForgot')->name('forgot');

Route::post('forgot', 'AuthController@resetPassword');
Route::get('reset', 'AuthController@getReset');

// Categories get.
Route::get('cate', 'HomeController@getCategories');

// Courses get.
Route::get('courses/id={id}', 'CourseController@showCourse')->name("courseDetail");
