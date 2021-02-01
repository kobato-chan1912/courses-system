<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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



// video watcher.
Route::get('video/watch={id}', 'VideoController@getVideoPage')->name("video");

// ADMIN Page.

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function (){
        return view('Admin.admin'); //admin dashboard.
    });

    // Course manager

    Route::get("/courses", 'AdminController@course')->name('adminCourse');
    Route::get('/courses/add', function (){
        $categories = DB::table("categories")->get();
       return view("Admin.Pages.courses.addcourse", ["categories" => $categories]);
    })->name("addCourse");

    Route::post('/courses/add', 'AdminController@addCourse');


    Route::get('/courses/detail/id={id}', 'AdminController@showDetail' )->name("adminCourseDetail");

    // new chapter.

    Route::get('/course={id_course}/chapter/new', 'AdminController@getNewChapter' )->name("adminNewChapter");
    Route::post('/course={id_course}/chapter/new', 'AdminController@addChapter');


    // new videos.
    Route::get("/videos/add/course={id_course}/tableColumn={id_column}", 'AdminController@getNewVideo')->name('adminNewVideos');
    Route::post("/videos/add/course={id_course}/tableColumn={id_column}", 'AdminController@addVideo');

});
