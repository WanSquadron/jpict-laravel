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

Route::get('/sekolah', function() {
	return view('/sekolah/sekolah');
});

#Sekolah
#Permohonan
Route::post('/sekolah/simpan-permohonan', 'SekolahController@SavePermohonan');
Route::get('/sekolah/permohonan-baru', 'SekolahController@PermohonanBaru');
Route::get('/getdata', 'SekolahController@GetData');


#Global Authentication
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/access-denied', 'HomeController@AccessDenied');


