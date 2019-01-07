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


Route::get('/daftar-permohonan', 'SekolahController@DaftarPermohonan');
Route::get('/permohonan-baru', 'SekolahController@PeruntukanKewangan');
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/access-denied', 'HomeController@AccessDenied');

