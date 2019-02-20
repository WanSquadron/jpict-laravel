<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;
use DB;

use App\GlobalKategoriPeralatan;
use App\GlobalNomborPermohonan;
use App\GlobalPeruntukanKewangan;
use App\GlobalSenaraiPeralatan;
use App\GlobalStatusBeli;

use App\Maklumat;
use App\PembelianPeralatan;
use App\Permohonan;
use App\SesiMesyuarat;
use App\UploadDokumen;


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
    	//$jumlahpermohonan = DB::table('permohonan')
    	//					->select('kodsekolah')
    	//					->where('moh_codesek','=',Auth::user()->kodsekolah)->count();

        $jumlahpermohonan = Auth::User()->Permohonan()->count();

    	//$ditolak = DB::table('permohonan')
    	//			->select('kodsekolah')
    	//			->where('moh_codesek','=', Auth::user()->kodsekolah)
    	//			->where('moh_statusm','=', '3')
    	//			->count();

        $ditolak = Auth::User()->Permohonan()->where('fk_statusmohon', '=', 3)->count();
		return view('sekolah.sekolah', [
			'jumlahpermohonan' => $jumlahpermohonan,
			'ditolak' => $ditolak
		]);
    }


    #Permohonan JPICT
    # Query Data Maklumat Sekolah
    public function CreatePermohonan()
    {
    	if(!Auth::User())
        {
            return view('errors.access-denied');
        }
        else
        {
          return view('sekolah.permohonan-baru',[
                                                'maklumat' => Auth::User(),
                                                'peruntukan' => GlobalPeruntukanKewangan::all()
                                                ]);  
        }
    }

    #Senarai Permohonan bagi sekolah
    public function SenaraiPermohonan($kodsekolah)
    {
        if(Auth::User()->kodsekolah != $kodsekolah)
        {
            return view('errors.access-denied');
        }
        else
        {
           $senarai = Auth::User()->Permohonan()->get();

            return view('sekolah.permohonan',[ 
                                            'senarai' => $senarai,
                                            'kodsekolah' => $kodsekolah ]); 
        }
    }

    #Show Dokumen untuk Muatnaik
    public function Dokumen($idmohon)
    {
        $kewangan = Auth::User()->Permohonan()->where('idpermohonan', '=', $idmohon)->first();
        $kew = $kewangan->fk_idsumberkewangan;

        return view('sekolah.permohonan-dokumen',[
            'kew' => $kew,
            'idmohon' => $idmohon
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
                                        ['fk_idpermohonan', '=', $NomborPermohonan],
                                        ['fk_kodsurat', '=', 1]
                                    ])->count();

            $newFilename = "Borang_Permohonan_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->fk_idpermohonan = $NomborPermohonan;
                $dokumen->fk_kodsurat = "1";
                $dokumen->nama_fail = $newFilename;
                $dokumen->fail_deskripsi = "Borang Permohonan JPICT";
                echo var_dump($dokumen->save());  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['fk_idpermohonan', '=', $NomborPermohonan],
                                            ['fk_kodsurat', '=', 1]
                                        ])->first();
                $dokumen->nama_fail = $newFilename;
                $dokumen->save();
            }
            
        } 

        if ($JenisDokumen == 'surat-iringan') {

            $validate = UploadDokumen::where([
                                        ['fk_idpermohonan', '=', $NomborPermohonan],
                                        ['fk_kodsurat', '=', 2]
                                    ])->count();

            $newFilename = "Surat_Iringan_Permohonan_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->fk_idpermohonan = $NomborPermohonan;
                $dokumen->fk_kodsurat = "2";
                $dokumen->nama_fail = $newFilename;
                $dokumen->fail_deskripsi = "Surat Iringan Permohonan JPICT";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['fk_idpermohonan', '=', $NomborPermohonan],
                                            ['fk_kodsurat', '=', 2]
                                        ])->first();
                $dokumen->nama_fail = $newFilename;
                $dokumen->fail_deskripsi = "Surat Iringan Permohonan JPICT";
                $dokumen->save();
            }
            
        }       
        else if($JenisDokumen == 'surat-kedudukankewangan') {

            $validate = UploadDokumen::where([
                                        ['fk_idpermohonan', '=', $NomborPermohonan],
                                        ['fk_kodsurat', '=', 3]
                                    ])->count();

            $newFilename = "Surat_Kedudukan_Kewangan_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->fk_idpermohonan = $NomborPermohonan;
                $dokumen->fk_kodsurat = "3";
                $dokumen->nama_fail = $newFilename;
                $dokumen->fail_deskripsi = "Surat Kedudukan Kewangan Sekolah";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['fk_idpermohonan', '=', $NomborPermohonan],
                                            ['fk_kodsurat', '=', 3]
                                        ])->first();
                $dokumen->nama_fail = $newFilename;
                $dokumen->fail_deskripsi = "Surat Kedudukan Kewangan Sekolah";
                $dokumen->save();
            }
        }

        else if($JenisDokumen == 'borang-ppkp') {

            $validate = UploadDokumen::where([
                                        ['fk_idpermohonan', '=', $NomborPermohonan],
                                        ['fk_kodsurat', '=', 4]
                                    ])->count();

            $newFilename = "Borang_PPKP_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->fk_idpermohonan = $NomborPermohonan;
                $dokumen->fk_kodsurat = "4";
                $dokumen->nama_fail = $newFilename;
                $dokumen->fail_deskripsi = "Borang PPKP";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['fk_idpermohonan', '=', $NomborPermohonan],
                                            ['fk_kodsurat', '=', 4]
                                        ])->first();
                $dokumen->nama_fail = $newFilename;
                $dokumen->save();
            }
        }

        else if($JenisDokumen == 'surat-kelulusangunaperuntukan') {

            $validate = UploadDokumen::where([
                                        ['fk_idpermohonan', '=', $NomborPermohonan],
                                        ['fk_kodsurat', '=', 5]
                                    ])->count();

            $newFilename = "Surat_Kelulusan_Guna_Peruntukan_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->fk_idpermohonan = $NomborPermohonan;
                $dokumen->fk_kodsurat = "5";
                $dokumen->nama_fail = $newFilename;
                $dokumen->fail_deskripsi = "Surat Kelulusan Menggunakan Peruntukan Kewangan";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['fk_idpermohonan', '=', $NomborPermohonan],
                                            ['fk_kodsurat', '=', 5]
                                        ])->first();
                $dokumen->nama_fail = $newFilename;
                $dokumen->fail_deskripsi = "Surat Kelulusan Menggunakan Peruntukan Kewangan";
                $dokumen->save();
            }
        }
        else if($JenisDokumen == 'surat-minitmesyuarat') {

            $validate = UploadDokumen::where([
                                        ['fk_idpermohonan', '=', $NomborPermohonan],
                                        ['fk_kodsurat', '=', 6]
                                    ])->count();

            $newFilename = "Surat_Minit_Mesyuarat_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->fk_idpermohonan = $NomborPermohonan;
                $dokumen->fk_kodsurat = "6";
                $dokumen->nama_fail = $newFilename;
                $dokumen->fail_deskripsi = "Surat Minit Mesyuarat Kelulusan Peruntukan Kewangan";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['fk_idpermohonan', '=', $NomborPermohonan],
                                            ['fk_kodsurat', '=', 6]
                                        ])->first();
                $dokumen->nama_fail = $newFilename;
                $dokumen->fail_deskripsi = "Surat Minit Mesyuarat Kelulusan Peruntukan Kewangan";
                $dokumen->save();
            }
        }
        else if($JenisDokumen == 'sebutharga-1') {

            $validate = UploadDokumen::where([
                                        ['fk_idpermohonan', '=', $NomborPermohonan],
                                        ['fk_kodsurat', '=', 7]
                                    ])->count();

            $newFilename = "Sebut_Harga1_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->fk_idpermohonan = $NomborPermohonan;
                $dokumen->fk_kodsurat = "7";
                $dokumen->nama_fail = $newFilename;
                $dokumen->fail_deskripsi = "Surat Sebutharga Pertama";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['fk_idpermohonan', '=', $NomborPermohonan],
                                            ['fk_kodsurat', '=', 7]
                                        ])->first();
                $dokumen->nama_fail = $newFilename;
                $dokumen->save();
            }
        }
        else if($JenisDokumen == 'sebutharga-2') {

            $validate = UploadDokumen::where([
                                        ['fk_idpermohonan', '=', $NomborPermohonan],
                                        ['fk_kodsurat', '=', 8]
                                    ])->count();

            $newFilename = "Sebut_Harga2_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->fk_idpermohonan = $NomborPermohonan;
                $dokumen->fk_kodsurat = "8";
                $dokumen->nama_fail = $newFilename;
                $dokumen->fail_deskripsi = "Surat Sebutharga Kedua";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['fk_idpermohonan', '=', $NomborPermohonan],
                                            ['fk_kodsurat', '=', 8]
                                        ])->first();
                $dokumen->nama_fail = $newFilename;
                $dokumen->save();
            }
        }
        else if($JenisDokumen == 'sebutharga-3') {

            $validate = UploadDokumen::where([
                                        ['fk_idpermohonan', '=', $NomborPermohonan],
                                        ['fk_kodsurat', '=', 9]
                                    ])->count();

            $newFilename = "Sebut_Harga3_".$NomborPermohonan.".pdf";

            if(empty($validate)) {
                $dokumen = new UploadDokumen;
                $dokumen->fk_idpermohonan = $NomborPermohonan;
                $dokumen->fk_kodsurat = "9";
                $dokumen->nama_fail = $newFilename;
                $dokumen->fail_deskripsi = "Surat Sebutharga Ketiga";
                $dokumen->save();  
            } else {
                $dokumen = UploadDokumen::where([
                                            ['fk_idpermohonan', '=', $NomborPermohonan],
                                            ['fk_kodsurat', '=', 9]
                                        ])->first();
                $dokumen->nama_fail = $newFilename;
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

    public function EditPermohonan ($idmohon)
    {
        $maklumat = Auth::User()->Permohonan()->where('idpermohonan', '=', $idmohon)->first();
        $surat_iringan = UploadDokumen::where([
                                            ['fk_idpermohonan', '=', $idmohon],
                                            ['fk_kodsurat', '=', '2']])
                                            ->first();
        $surat_kelulusan = UploadDokumen::where([
                                            ['fk_idpermohonan', '=', $idmohon],
                                            ['fk_kodsurat', '=', '5']])
                                            ->first();
        $minit_mesyuarat = UploadDokumen::where([
                                            ['fk_idpermohonan', '=', $idmohon],
                                            ['fk_kodsurat', '=', '6']])
                                            ->first();

    return view('sekolah.permohonan-edit', [ 
        'maklumat' => $maklumat,
        'surat_iringan' => $surat_iringan,
        'surat_kelulusan' => $surat_kelulusan,
        'minit_mesyuarat' => $minit_mesyuarat,
        'peruntukan' => GlobalPeruntukanKewangan::all()

    ]);

    }



//========================= BAHAGIAN INSERT MAKLUMAT KE DATABASE =============================

    #  Maklumat Permohonan (permohonan-baru.blade.php)
    public function SavePermohonan(Request $request)
    {
    	$numohon = GlobalNomborPermohonan::first();
        $mesyuarat = SesiMesyuarat::where('sesi_mesyuarat', '=', 1)->first();
    	$numbers = date('Y')."-".$mesyuarat->sesi_mesyuarat."-".$numohon->nombor_permohonan;
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
    	$mohon->idpermohonan = $numbers;
    	$mohon->fk_kodsekolah = $kodsek;
        $mohon->fk_kodppd = Auth::User()->fk_kodppd;
    	$mohon->fk_idsumberkewangan = $sumberp;
        $mohon->fk_statusmohon = '1';
    	$mohon->keterangan = $ketrngn;
    	$mohon->tujuanbeli = $tujubli;
    	$mohon->justifikasi = $justfks;
        $mohon->pegawaitanggungjawab = $pegawai;
        $mohon->mykadpegawai = $nomykad;
        $mohon->notelpegawai = $notelfn;
        $mohon->jumlahwang = $jumwang;
        $mohon->bakiwang = $bakwang;
    	$mohon->save();

        #Insert No Rujukan
        $rujukan1 = new UploadDokumen;
        $rujukan1->fk_idpermohonan = $numbers;
        $rujukan1->fk_kodsurat = "2";
        $rujukan1->no_rujukan = $iringan;
        $rujukan1->save();

        $rujukan2 = new UploadDokumen;
        $rujukan2->fk_idpermohonan = $numbers;
        $rujukan2->fk_kodsurat = "5";
        $rujukan2->no_rujukan = $gunaperuntukan;
        $rujukan2->save();

        $rujukan3 = new UploadDokumen;
        $rujukan3->fk_idpermohonan = $numbers;
        $rujukan3->fk_kodsurat = "6";
        $rujukan3->no_rujukan = $minit_mesyuarat;
        $rujukan3->save();

        GlobalNomborPermohonan::increment('nombor_permohonan');
    	//DB::table('glo_numohon')->increment('unique'); 
    	return redirect('/sekolah/peralatan/'.$numbers);
    }

    public function Peralatan($idmohon) 
    {
        $jumlaharga = 0;
        $jumlah = 0;

        $pembelian = PembelianPeralatan::where('fk_idpermohonan', '=', $idmohon)->get();

            foreach($pembelian as $beli)
            {
                $jumlaharga += ($beli->hargaseunit * $beli->kuantiti);
            }

            return view('sekolah.permohonan-alatan',[ 
                        'idmohon' => $idmohon,
                        'perkakasan' => GlobalSenaraiPeralatan::all(),
                        'peralatan' => PembelianPeralatan::where('fk_idpermohonan','=', $idmohon)->get(),
                        'jumlaharga' => $jumlaharga,
                        'jumlah' => $jumlah
        ]);
    }

    public  function SavePeralatan(Request $request, $id)
    {

        $idmohon = htmlentities($request->input('idmohon'),ENT_QUOTES);
        $pralatn = htmlentities($request->input('pralatn'),ENT_QUOTES);
        $kuantti = htmlentities($request->input('kuantti'),ENT_QUOTES);
        $hrgalat = htmlentities($request->input('hrgalat'),ENT_QUOTES);
        $statbli = htmlentities($request->input('statbli'),ENT_QUOTES);

        $peralatan = new PembelianPeralatan;
        $peralatan->fk_idpermohonan = $idmohon;
        $peralatan->fk_idperalatan = $pralatn;
        $peralatan->fk_idstatusbeli = $statbli;
        $peralatan->kuantiti = $kuantti;
        $peralatan->hargaseunit = $hrgalat;
        $peralatan->save();

        $jumlaharga = 0;
        $jumlah = 0;

        $pembelian = PembelianPeralatan::where('fk_idpermohonan', '=', $idmohon)->get();

            foreach($pembelian as $beli)
            {
                $jumlaharga += ($beli->hargaseunit * $beli->kuantiti);
            }

        return redirect('/sekolah/peralatan/' .$idmohon);

    }

    public function DeletePeralatan($id)
    {
        $alat = PembelianPeralatan::where('id',$id)->first();

        PembelianPeralatan::destroy($id);
        echo "setTimeout(function(){ window.location.href = '/sekolah/peralatan/".$alat->fk_idpermohonan."'; }, 10);";
        echo "$('#alatan_$id').remove();";
    }
}
