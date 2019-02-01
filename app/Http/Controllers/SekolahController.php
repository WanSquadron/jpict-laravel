<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PeruntukanKewangan;
use App\DaftarPermohonan;
use App\Users;
use App\Maklumat;
use App\NomborPermohonan;
use App\StatusBeli;
use DB;

class SekolahController extends Controller
{


//========================= BAHAGIAN QUERY DATA UNTUK DROP DOWN DAN LAIN-LAIN =========================	
	    public function __construct(Request $r)
    {

        $this->middleware('auth');

    }


    
    # Query data Statistic Home Page
    public function Index()
    {
    	$jumlahpermohonan = DB::table('permohonan')
    						->select('kodsekolah')
    						->where('moh_codesek','=',Auth::user()->kodsekolah)->count();

    	$ditolak = DB::table('permohonan')
    				->select('kodsekolah')
    				->where('moh_codesek','=', Auth::user()->kodsekolah)
    				->where('moh_statusm','=', '3')
    				->count();
		return view('sekolah.sekolah', [
			'jumlahpermohonan' => $jumlahpermohonan,
			'ditolak' => $ditolak
		]);
    }


    #Permohonan JPICT
    # Query Data Maklumat Sekolah
    public function CreatePermohonan()
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

    #Senarai Permohonan bagi sekolah
    public function SenaraiPermohonan()
    {
    	$senarai = Auth::User()->Permohonan->where('moh_statusm','=','2');

    	return view('sekolah.permohonan',[ 'senarai' => $senarai ]);
    }

    #Show Dokumen untuk Muatnaik
    public function UploadDokumen(Request $r)
    {
        $kew = $r->kew;
        $id = $r->id;
        return view('sekolah.upload-dokumen',[
            'kew' => $kew,
            'id' => $id
        ]);
    }


//========================= BAHAGIAN INSERT MAKLUMAT KE DATABASE =============================

    #  Maklumat Permohonan (permohonan-baru.blade.php)
    public function SavePermohonan(Request $request)
    {
    	$numohon = NomborPermohonan::first();
    	$nom_permohonan = date('Y')."/01/".$numohon->unique;
    	$kodsek  = htmlentities($request->input('kodsek'),ENT_QUOTES);
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
    	if(empty($tahunbl = htmlentities($request->input('tahunbl'),ENT_QUOTES)))
            { 
                $tahunbl = "0000";
            }
            else
                { 
                    $tahunbl = $tahunbl;
                }
            

    	# Insert
    	$mohon = new DaftarPermohonan;
    	$mohon->moh_numbers = $nom_permohonan;
    	$mohon->moh_codesek = $kodsek;
    	$mohon->moh_sumberp = $sumberp;
    	$mohon->moh_ketrngn = $sumdesc;
    	$mohon->moh_tujuanb = $tujubli;
    	$mohon->moh_justfks = $justfks;
        $mohon->moh_hrgaict = $hrgabli;
        $mohon->moh_statusm = $statbli;
        $mohon->moh_thnbeli = $tahunbl;

    	$mohon->save();

    	DB::table('glo_numohon')->increment('unique');
    	return redirect('/sekolah/upload-dokumen/?id='.$nom_permohonan.'/?kew='.$sumberp);
    }
}
