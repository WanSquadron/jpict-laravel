<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PeruntukanKewangan;
use App\DaftarPermohonan;
use App\Users;
use App\Maklumat;
use DB;

class SekolahController extends Controller
{

//========================= BAHAGIAN QUERY DATA UNTUK DROP DOWN DAN LAIN-LAIN =========================	
	

    # Query Data Maklumat Sekolah
    public function PermohonanBaru()
    {
    	$maklumat = DB::table('users')
    			->select(DB::raw('id,email,name,kodsekolah,notel,nofaks,poskod,ppd'))
    			->where('id','=', Auth::user()->id)
    			->first();

    	return view('sekolah.permohonan-baru',[
    		'maklumat' => $maklumat,
    		'peruntukan' => PeruntukanKewangan::all()
    	]);
    }


//========================= BAHAGIAN INSERT MAKLUMAT KE DATABASE =============================

    #  Maklumat Permohonan (permohonan-baru.blade.php)
    public function SavePermohonan(Request $request)
    {
    	$kodsek  = htmlentities($request->input('codesek'),ENT_QUOTES);
    	$pegawai = htmlentities($request->input('pegawai'),ENT_QUOTES);
    	$notepon = htmlentities($request->input('notepon'),ENT_QUOTES);
    	$nomfaks = htmlentities($request->input('nomfaks'),ENT_QUOTES);
    	$almtmel = htmlentities($request->input('almtmel'),ENT_QUOTES);
    	$sumberp = htmlentities($request->input('sumberp'),ENT_QUOTES);
    	$sumdesc = htmlentities($request->input('sumdesc'),ENT_QUOTES);
    	$tujubli = htmlentities($request->input('tujubli'),ENT_QUOTES);
    	$justfks = htmlentities($request->input('justfks'),ENT_QUOTES);
    	$hrgabli = htmlentities($request->input('hrgabli'),ENT_QUOTES);
    	$statbli = htmlentities($request->input('statbli'),ENT_QUOTES);
    	$tahunbl = htmlentities($request->input('tahunbl'),ENT_QUOTES);

    	# Insert
    	$mohon = new DaftarPermohonan;
    	$mohon->moh_codesek = $kodsek;
    	$mohon->moh_sumberp = $sumberp;
    	$mohon->moh_ketrngn = $sumdesc;
    	$mohon->moh_tujuanb = $tujubli;
    	$mohon->moh_justfks = $justfks;
    	$mohon->save();

    	return redirect('/permohonan-baru/?status=success');
    }
}
