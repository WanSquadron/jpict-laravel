<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeruntukanKewangan;
use App\DaftarPermohonan;

class SekolahController extends Controller
{

//========================= BAHAGIAN QUERY DATA UNTUK DROP DOWN DAN LAIN-LAIN =========================	
	

	# Query Data Senarai Peruntukan Kewangan
    public function PeruntukanKewangan()
    {
    	return view('sekolah.permohonan-baru',['peruntukan' => PeruntukanKewangan::all()]);

    }


//========================= BAHAGIAN INSERT MAKLUMAT KE DATABASE =============================

    # Insert Maklumat Permohonan (permohonan-baru.blade.php)
    public function DaftarPermohonan(Request $request)
    {
    	$kodsek = $request->input('kodsklh');
    	$pegawai = $request->input('pegawai');
    	$notepon = $request->input('notepon');
    	$nomfaks = $request->input('nomfaks');
    	$almtmel = $request->input('almtmel');
    	$sumberp = $request->input('sumberp');
    	$sumdesc = $request->input('sumdesc');
    	$tujubli = $request->input('tujubli');
    	$justfks = $request->input('justfks');
    	$hrgabli = $request->input('hrgabli');
    	$statbli = $request->input('statbli');
    	$tahunbl = $request->input('tahunbl');

    	SweetAlert("Controller Daftar Masuk");
    }
}
