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

### Global Route
Route::auth();
Route::get('/', function () { return view('auth.login');});
Route::get('/dashboard', function () { return view('dashboard');});

## HomeController
Route::get('/home', 'HomeController@index');
Route::get('/access-denied', 'HomeController@AccessDenied');

## Avatar
Route::get('/avtr', 'HomeController@Avatar');
Route::post('/avtr/upload', 'HomeController@UploadAvatar');
Route::get('/avtr/delete', 'HomeController@DeleteAvatar');
Route::get('/avtr/{id}', 'HomeController@Avatar');

## Profil
Route::get('/sekolah/profil/{kodsekolah}', 'SekolahController@Profil');
Route::post('sekolah/kemaskini-profil/{kodsekolah}', 'SekolahController@KemaskiniProfil');

##Senarai Dokumen Wajib
Route::get('/dokumen', function() {return view('dokumen');});
	
### Middleware Grouping
Route::group(['middleware' => ['role:Sekolah']], function()
{

## User Role Sekolah
# Profil
	Route::get('/sekolah','SekolahController@Index');
	Route::get('/sekolah/{status}','SekolahController@Index');

# Permohonan GET
	Route::get('/sekolah/peralatan/{idmohon}', 'SekolahController@Peralatan');
	Route::get('/sekolah/permohonan/dokumen/{idmohon}', 'SekolahController@Dokumen');
	Route::get('/sekolah/permohonan/{kodsekolah}','SekolahController@SenaraiPermohonan');
	Route::get('/sekolah/permohonan-baru/{kodsekolah}', 'SekolahController@CreatePermohonan');
	Route::get('/sekolah/surat_terima/{idmohon}', 'SekolahController@Surat');

# Permohonan EDIT
	Route::get('/sekolah/permohonan/kemaskini/{idmohon}', 'SekolahController@EditPermohonan');
	Route::get('/sekolah/permohonan/kemaskini/peralatan/{idmohon}', 'SekolahController@Peralatan');
	Route::post('/sekolah/permohonan/kemaskini/peralatan/{idmohon}', 'SekolahController@UpdatePermohonan');

#Permohonan DELETE
	Route::get('/sekolah/peralatan/padam/{id}', 'SekolahController@DeletePeralatan');
	Route::get('/sekolah/permohonan/padam/{id}', 'SekolahController@DeletePermohonan');
	
# Permohonan SAVE
	Route::post('/sekolah/upload', 'SekolahController@SaveDokumen');
	Route::post('/sekolah/simpan-peralatan/{id}', 'SekolahController@SavePeralatan');
	Route::post('/sekolah/simpan-permohonan/{kodsekolah}', 'SekolahController@SavePermohonan');

});

### Middleware Grouping
Route::group(['middleware' => ['role:SuperAdmin']], function()
{

## User Role Superadmin
#Permohonan GET
	Route::get('/superadmin/permohonan', 'SuperadminController@SenaraiPermohonan');
	Route::get('/superadmin/permohonan/{stat}', 'SuperadminController@SenaraiPermohonan');
	Route::get('/superadmin/permohonan/view/{idmohon}', 'SuperadminController@ViewPermohonan');
	Route::get('/superadmin/permohonan/view/{idmohon}/{status}', 'SuperadminController@ViewPermohonan');

	###Bahagian Mesyuarat untuk Dibuat Keputusan Lulus/Ditolak
	Route::get('/superadmin/mesyuarat/permohonan', 'SuperadminController@MesyuaratPermohonan');
	Route::get('/superadmin/mesyuarat/permohonan/{id}', 'SuperadminController@ViewPermohonanMesyuarat');
	Route::get('/superadmin/mesyuarat/permohonan/{id}/{status}', 'SuperadminController@ViewPermohonanMesyuarat');


#Mesyuarat GET
	Route::get('/superadmin/mesyuarat', 'SuperadminController@SenaraiMesyuarat');
	Route::get('/superadmin/mesyuarat/{cmd}', 'SuperadminController@TambahMesyuarat');

#Permohonan DELETE
	Route::get('/superadmin/permohonan/padam/{id}', 'SuperadminController@DeletePermohonan');

#Permohonan POST
	Route::post('/superadmin/email/{idpermohonan}', 'SuperadminController@EmelTerimaPermohonan');
	Route::post('/superadmin/syor/{idpermohonan}', 'SuperadminController@SaveSyor');
	Route::post('/superadmin/mesyuarat/kelulusan/{id}', 'SuperadminController@SaveKelulusan');
});

