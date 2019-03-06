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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/show/{id}/{year}/show', 'HomeController@showCal')->name('meets.calendar');
Route::patch('/show/{id}/password', 'HomeController@meetPassword')->name('meets.password');;
Route::get('/show/{id}', 'HomeController@showMeet')->name('meets.show');

Route::resource('show/{id}/people', 'PersonController');
Route::resource('show/{id}/{year}/schedules', 'ScheduleController');
Route::resource('meets', 'MeetController')->except(['show']);

Route::resource('occasions', 'OccasionsController');
Route::resource('months', 'MonthController');
