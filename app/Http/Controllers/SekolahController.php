<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PeruntukanKewangan;
use App\Permohonan;
use App\Users;
use App\Maklumat;
use App\NomborPermohonan;
use App\StatusBeli;
Use App\UploadDokumen;
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
    	$senarai = Auth::User()->Permohonan;

    	return view('sekolah.permohonan',[ 'senarai' => $senarai ]);
    }

    #Show Dokumen untuk Muatnaik
    public function Dokumen(Request $r)
    {
        $kew = $r->kew;
        $id = $r->id;
        return view('sekolah.dokumen',[
            'kew' => $kew,
            'id' => $id
        ]);
    }

    public function SaveDokumen(Request $r)
    {

    $FileType = strtolower($_FILES['file']['type']);
    $tmpName = $_FILES['file']['tmp_name']; 
    $isUploadedFile = is_uploaded_file($_FILES['file']['tmp_name']);
    
    $JenisDokumen = strtolower($_POST['_jenis']);
    $NomborPermohonan = strtolower($_POST['_nomohon']);

    if ($isUploadedFile == true)
    {
        // dekat sini ko kene buat apa perlu buat dengan dokumen tersebut
        // 1. rename nama file @ whatever
        // 2. move the document to certain folder @ database
        // 3. and finally return "OK" when all success

        if ($JenisDokumen == 'surat-iringan') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 1]
                                    ])->count();

            $newFilename = "Surat_Iringan_Permohonan_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "1";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Iringan Permohonan JPICT";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['id_permohonan', '=', $NomborPermohonan],
                                            ['code_surat', '=', 1]
                                        ])->first();
                $dokumen->filename = $newFilename;
                $dokumen->save();
            }
            
        }       
        else if($JenisDokumen == 'surat-kedudukankewangan') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 2]
                                    ])->count();

            $newFilename = "Surat_Kedudukan_Kewangan_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "2";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Kedudukan Kewangan Sekolah";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['id_permohonan', '=', $NomborPermohonan],
                                            ['code_surat', '=', 2]
                                        ])->first();
                $dokumen->filename = $newFilename;
                $dokumen->save();
            }
        }

        else if($JenisDokumen == 'surat-kelulusangunaperuntukan') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 3]
                                    ])->count();

            $newFilename = "Surat_Kelulusan_Guna_Peruntukan_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "3";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Kelulusan Menggunakan Peruntukan Kewangan";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['id_permohonan', '=', $NomborPermohonan],
                                            ['code_surat', '=', 3]
                                        ])->first();
                $dokumen->filename = $newFilename;
                $dokumen->save();
            }
        }
        else if($JenisDokumen == 'surat-minitmesyuarat') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 4]
                                    ])->count();

            $newFilename = "Surat_Minit_Mesyuarat_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "4";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Minit Mesyuarat Kelulusan Peruntukan Kewangan";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['id_permohonan', '=', $NomborPermohonan],
                                            ['code_surat', '=', 4]
                                        ])->first();
                $dokumen->filename = $newFilename;
                $dokumen->save();
            }
        }
        else if($JenisDokumen == 'sebutharga-1') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 5]
                                    ])->count();

            $newFilename = "Sebut_Harga1_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "5";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Sebutharga Pertama";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['id_permohonan', '=', $NomborPermohonan],
                                            ['code_surat', '=', 5]
                                        ])->first();
                $dokumen->filename = $newFilename;
                $dokumen->save();
            }
        }
        else if($JenisDokumen == 'sebutharga-2') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 6]
                                    ])->count();

            $newFilename = "Sebut_Harga2_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "6";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Sebutharga Kedua";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['id_permohonan', '=', $NomborPermohonan],
                                            ['code_surat', '=', 6]
                                        ])->first();
                $dokumen->filename = $newFilename;
                $dokumen->save();
            }
        }
        else if($JenisDokumen == 'sebutharga-3') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 7]
                                    ])->count();

            $newFilename = "Sebut_Harga3_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "7";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Sebutharga Ketiga";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['id_permohonan', '=', $NomborPermohonan],
                                            ['code_surat', '=', 7]
                                        ])->first();
                $dokumen->filename = $newFilename;
                $dokumen->save();
            }
        }

        $newPathfile = public_path() . "/upload/".$newFilename;
        // dalam folder public/upload/
        // create folder upload dalam folder public

        $isMove = move_uploaded_file($tmpName, $newPathfile);
        if ($isMove) {
            echo "OK";
        } else {
            echo "Ralat semasa muat naik dokumen kertas kerja anda. Sila cuba lagi !";
        }
    }
    else
    {
      // failed upload
        echo "KO";
    }

}
    public function EditPermohonan (Request $r)
    {
        $maklumat = DB::table('users')
                ->select(DB::raw('id,email,name,kodsekolah,notel,nofaks,poskod,ppd'))
                ->where('id','=', Auth::user()->id)
                ->first();

        $edit = Permohonan::where('moh_numbers', '=', $r->id)->first();

    return view('sekolah.permohonan-edit', [ 
        'edit' => $edit ,
        'maklumat' => $maklumat,
        'peruntukan' => PeruntukanKewangan::all()

    ]);

    }


//========================= BAHAGIAN INSERT MAKLUMAT KE DATABASE =============================

    #  Maklumat Permohonan (permohonan-baru.blade.php)
    public function SavePermohonan(Request $request)
    {
    	$numohon = NomborPermohonan::first();
    	$nom_permohonan = date('Y')."_01_".$numohon->unique;
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
    	$mohon = new Permohonan;
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
    	return redirect('/sekolah/dokumen/?id='.$nom_permohonan.'&kew='.$sumberp);
    }
}
