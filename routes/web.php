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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/tempatkos/list/{id_user}', 'TempatKosController@listpemilik');

Route::get('/syaratketentuan', function(){
    return view('syaratdanketentuan');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('komentar/create/{id_kos}', 'KomentarsController@create_manual');
Route::get('pembayaran/create/{id_kos}', 'PembayaransController@create_manual');
Route::post('clus', 'TempatKosController@clustering');

Route::resource('komentar', 'KomentarsController');
Route::resource('users', 'UsersController');
Route::resource('tempatkos', 'TempatKosController');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/list', 'TempatKosController@index')->name('list');