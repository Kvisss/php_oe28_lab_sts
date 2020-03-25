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

Route::group(['prefix' => 'admincp'], function () {
    Route::get('/', 'CourseController@index')->name('adminIndex');

    Route::resource('courses', 'CourseController');

    Route::resource('courseuser', 'AdminController\CourseUserController');

    Route::resource('subjects', 'AdminController\SubjectController');
});

Route::get('/', 'Auth\LoginController@index')->name('indexLogin');

Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/home', 'Client\HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'courses', 'as' => 'courses.'], function () {
    Route::get('detail/{course}', 'Client\HomeController@show')->name('detail');
});
