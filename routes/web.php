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
	Route::get('/sekolah','SekolahController@Index');
	Route::get('/sekolah/permohonan/{kodsekolah}','SekolahController@SenaraiPermohonan');
	Route::get('/sekolah/permohonan-baru/{kodsekolah}', 'SekolahController@CreatePermohonan');
	Route::get('/sekolah/permohonan-edit', 'SekolahController@EditPermohonan');
	Route::get('/sekolah/peralatan/{idmohon}', 'SekolahController@Peralatan');
	Route::get('/sekolah/dokumen', 'SekolahController@Dokumen');
	Route::get('/sekolah/peralatan/padam/{id}', 'SekolahController@DeletePeralatan');
	Route::post('/sekolah/upload', 'SekolahController@SaveDokumen');
	Route::post('/sekolah/simpan-permohonan/{kodsekolah}', 'SekolahController@SavePermohonan');
	Route::post('/sekolah/simpan-peralatan/{id}', 'SekolahController@SavePeralatan');

	

//});


#Global Authentication



