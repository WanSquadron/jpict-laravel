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

Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/access-denied', 'HomeController@AccessDenied');

Route::group(['middleware' => ['role:SuperAdmin']], function() 
{
	Route::get('/superadmin', function () {
		return view('superadmin.superadmin');
	});
});


//Route::group(['middleware' => ['role:Sekolah']], function()
//{
	Route::get('/sekolah/permohonan','SekolahController@SenaraiPermohonan');
	Route::get('/sekolah/permohonan-baru', 'SekolahController@CreatePermohonan');
	Route::post('/sekolah/simpan-permohonan', 'SekolahController@SavePermohonan');
	Route::get('/sekolah/upload-dokumen', 'SekolahController@UploadDokumen');
	Route::get('/sekolah','SekolahController@Index');

//});


#Global Authentication



