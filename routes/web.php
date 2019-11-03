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
    // return "welcome";
});

Route::get('/login', function(){
    return view('login');
});

Route::resource('komentar', 'KomentarsController');
// Route::resource('users', 'UsersController');
Route::resource('tempatkos', 'TempatKosController');
Route::resource('ratings', 'RatingsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
