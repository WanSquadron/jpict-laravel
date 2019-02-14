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
Use App\SesiMesyuarat;
Use App\GlobalPeralatan;
Use App\KategoriPeralatan;
Use App\Peralatan;
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
        return view('sekolah.permohonan-dokumen',[
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

        if ($JenisDokumen == 'borang-permohonan') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 1]
                                    ])->count();

            $newFilename = "Borang_Permohonan_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "1";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Borang Permohonan JPICT";
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

        if ($JenisDokumen == 'surat-iringan') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 2]
                                    ])->count();

            $newFilename = "Surat_Iringan_Permohonan_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "2";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Iringan Permohonan JPICT";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['id_permohonan', '=', $NomborPermohonan],
                                            ['code_surat', '=', 2]
                                        ])->first();
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Iringan Permohonan JPICT";
                $dokumen->save();
            }
            
        }       
        else if($JenisDokumen == 'surat-kedudukankewangan') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 3]
                                    ])->count();

            $newFilename = "Surat_Kedudukan_Kewangan_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "3";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Kedudukan Kewangan Sekolah";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['id_permohonan', '=', $NomborPermohonan],
                                            ['code_surat', '=', 3]
                                        ])->first();
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Kedudukan Kewangan Sekolah";
                $dokumen->save();
            }
        }

        else if($JenisDokumen == 'borang-ppkp') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 4]
                                    ])->count();

            $newFilename = "Borang_PPKP_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "4";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Borang PPKP";
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

        else if($JenisDokumen == 'surat-kelulusangunaperuntukan') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 5]
                                    ])->count();

            $newFilename = "Surat_Kelulusan_Guna_Peruntukan_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "5";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Kelulusan Menggunakan Peruntukan Kewangan";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['id_permohonan', '=', $NomborPermohonan],
                                            ['code_surat', '=', 5]
                                        ])->first();
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Kelulusan Menggunakan Peruntukan Kewangan";
                $dokumen->save();
            }
        }
        else if($JenisDokumen == 'surat-minitmesyuarat') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 6]
                                    ])->count();

            $newFilename = "Surat_Minit_Mesyuarat_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "6";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Minit Mesyuarat Kelulusan Peruntukan Kewangan";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['id_permohonan', '=', $NomborPermohonan],
                                            ['code_surat', '=', 6]
                                        ])->first();
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Minit Mesyuarat Kelulusan Peruntukan Kewangan";
                $dokumen->save();
            }
        }
        else if($JenisDokumen == 'sebutharga-1') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 7]
                                    ])->count();

            $newFilename = "Sebut_Harga1_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "7";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Sebutharga Pertama";
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
        else if($JenisDokumen == 'sebutharga-2') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 8]
                                    ])->count();

            $newFilename = "Sebut_Harga2_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "8";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Sebutharga Kedua";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['id_permohonan', '=', $NomborPermohonan],
                                            ['code_surat', '=', 8]
                                        ])->first();
                $dokumen->filename = $newFilename;
                $dokumen->save();
            }
        }
        else if($JenisDokumen == 'sebutharga-3') {

            $validate = UploadDokumen::where([
                                        ['id_permohonan', '=', $NomborPermohonan],
                                        ['code_surat', '=', 9]
                                    ])->count();

            $newFilename = "Sebut_Harga3_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->id_permohonan = $NomborPermohonan;
                $dokumen->code_surat = "9";
                $dokumen->filename = $newFilename;
                $dokumen->file_desc = "Surat Sebutharga Ketiga";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['id_permohonan', '=', $NomborPermohonan],
                                            ['code_surat', '=', 9]
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
        $mesyuarat = SesiMesyuarat::where('mes_session', '=', 1)->first();
    	$numbers = date('Y')."-".$mesyuarat->mes_session."-".$numohon->unique;
    	$kodsek  = htmlentities($request->input('kodsek'),ENT_QUOTES);
    	$pegawai = htmlentities($request->input('pegawai'),ENT_QUOTES);
    	$notelfn = htmlentities($request->input('notelfn'),ENT_QUOTES);
    	$nomykad = htmlentities($request->input('nomykad'),ENT_QUOTES);
    	$sumberp = htmlentities($request->input('sumberp'),ENT_QUOTES);
    	$ketrngn = htmlentities($request->input('sumdesc'),ENT_QUOTES);
    	$tujubli = htmlentities($request->input('tujubli'),ENT_QUOTES);
    	$justfks = htmlentities($request->input('justfks'),ENT_QUOTES);
    	$jumwang = htmlentities($request->input('jumperuntukan'),ENT_QUOTES);
    	$bakwang = htmlentities($request->input('bakiperuntukan'),ENT_QUOTES);
        $iringan = htmlentities($request->input('surat_iringan'),ENT_QUOTES);
        $gunaperuntukan = htmlentities($request->input('surat_kelulusan_guna'),ENT_QUOTES);
        $minit_mesyuarat = htmlentities($request->input('minit_mesyuarat'),ENT_QUOTES);
            
    	# Insert
    	$mohon = new Permohonan;
    	$mohon->moh_numbers = $numbers;
    	$mohon->moh_codesek = $kodsek;
    	$mohon->moh_sumberp = $sumberp;
    	$mohon->moh_ketrngn = $ketrngn;
    	$mohon->moh_tujuanb = $tujubli;
    	$mohon->moh_justfks = $justfks;
        $mohon->moh_pegawai = $pegawai;
        $mohon->moh_nomykad = $nomykad;
        $mohon->moh_notelfn = $notelfn;
        $mohon->moh_jumwang = $jumwang;
        $mohon->moh_bakwang = $bakwang;
        $mohon->moh_statusm = '1';

    	$mohon->save();

        #Insert No Rujukan
        $rujukan1 = new UploadDokumen;
        $rujukan1->id_permohonan = $numbers;
        $rujukan1->code_surat = "2";
        $rujukan1->no_rujukan = $iringan;
        $rujukan1->save();

        $rujukan2 = new UploadDokumen;
        $rujukan2->id_permohonan = $numbers;
        $rujukan2->code_surat = "5";
        $rujukan2->no_rujukan = $gunaperuntukan;
        $rujukan2->save();

        $rujukan3 = new UploadDokumen;
        $rujukan3->id_permohonan = $numbers;
        $rujukan3->code_surat = "6";
        $rujukan3->no_rujukan = $minit_mesyuarat;
        $rujukan3->save();

    	DB::table('glo_numohon')->increment('unique');
    	return redirect('/sekolah/peralatan/'.$numbers);
    }

    public function Peralatan($idmohon)
    {
        return view('sekolah.permohonan-alatan',[ 
            'idmohon' => $idmohon,
            'perkakasan' => GlobalPeralatan::all(),
            'peralatan' => Peralatan::where('pra_idmohon','=', $idmohon)->get()
        ]);
    }

    public  function SavePeralatan(Request $request)
    {

        $idmohon = htmlentities($request->input('idmohon'),ENT_QUOTES);
        $pralatn = htmlentities($request->input('pralatn'),ENT_QUOTES);
        $kuantti = htmlentities($request->input('kuantti'),ENT_QUOTES);
        $hrgalat = htmlentities($request->input('hrgalat'),ENT_QUOTES);
        $statbli = htmlentities($request->input('statbli'),ENT_QUOTES);

        $peralatan = new Peralatan;
        $peralatan->pra_idmohon = $idmohon;
        $peralatan->pra_idalatn = $pralatn;
        $peralatan->pra_kuantti = $kuantti;
        $peralatan->pra_hrgalat = $hrgalat;
        $peralatan->pra_statbli = $statbli;
        $peralatan->save();

        echo "OK";


    }
}
