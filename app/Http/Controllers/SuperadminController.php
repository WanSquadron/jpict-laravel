<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Permohonan;
use App\GlobalMesyuarat;
use App\PembelianPeralatan;
use App\GlobalSyor;
use App\RujukanSurat;
use App\UploadDokumen;

class SuperadminController extends Controller
{
    public function SenaraiPermohonan(Request $request){
    	return view('superadmin.senaraipermohonan',[
    												'senarai' => Permohonan::all(),
                                                    'stat' => $request->stat
    												]);
    }

    public function SenaraiMesyuarat(Request $request){
    	return view('superadmin.senaraimesyuarat',['mesyuarat' => GlobalMesyuarat::all()]);

    }

    public function ViewPermohonan(Request $request, $idmohon){
    	$mohon = Permohonan::where('idpermohonan',$idmohon)->first();
    	$peralatan = PembelianPeralatan::where('fk_idpermohonan', $mohon->idpermohonan)->get();
    	$jumlaharga = 0;
        $jumlah = 0;

        $pembelian = PembelianPeralatan::where('fk_idpermohonan', '=', $idmohon)->get();

        $syor = GlobalSyor::all();

        $surat = RujukanSurat::where('fk_idpermohonan',$idmohon)->first();


            foreach($pembelian as $beli){
                $jumlaharga += ($beli->hargaseunit * $beli->kuantiti);
            }

    	return view('superadmin.paparpermohonan', [
    										'mohon' => $mohon,
    										'peralatan' => $peralatan,
    										'jumlaharga' => $jumlaharga,
                        					'jumlah' => $jumlah,
                                            'syor' => $syor,
                                            'surat' => $surat,
                                            'status' => $request->status
    												]);
    }

    public function SaveSyor(Request $request, $idpermohonan){

        $justifikasi = htmlentities($request->input('justifikasi'),ENT_QUOTES);
        $keputusan = htmlentities($request->input('syor'), ENT_QUOTES);
        $norujukan = htmlentities($request->input('surat_terima'), ENT_QUOTES);

        $syor = Permohonan::where('idpermohonan',$idpermohonan)->first();
        $syor->syor_justifikasi = $justifikasi;
        $syor->fk_idsyor = $keputusan;
        $syor->save();

        $validate = RujukanSurat::where('fk_idpermohonan',$idpermohonan)->count();

        if(empty($validate)){

            $surat = new RujukanSurat;
            $surat->fk_idpermohonan = $idpermohonan;
            $surat->norujukan = $norujukan;
            $surat->tajuksurat = "Surat Telah Terima Permohonan";
            $surat->save();

            return redirect('/superadmin/permohonan/?stat=success');

        } else { 

            $surat = RujukanSurat::where('fk_idpermohonan',$idpermohonan)->first();
            $surat->norujukan = $norujukan;
            $surat->save();
            
            return redirect('/superadmin/permohonan/?stat=success');

        } 

    }

    public function DeletePermohonan($id)
    {
        $kod = Permohonan::where('id', '=', $id)->first();
        $dokumen = UploadDokumen::where('fk_idpermohonan', '=', $kod->idpermohonan)->get();
        $alatan = PembelianPeralatan::where('fk_idpermohonan', '=', $kod->idpermohonan)->get();

        foreach($dokumen as $doc)
        {
            
          
            $padamdokumen = UploadDokumen::destroy($doc->id);
        }

        foreach($alatan as $alat)
        {
            $padamalat = PembelianPeralatan::destroy($alat->id);
        }

        
        $permohonan = Permohonan::destroy($id);

       echo "setTimeout(function(){ window.location.href = '/superadmin/permohonan/'; }, 5);";
    }

    ##Bahagian Mesyuarat Kelulusan JPICT

    public function MesyuaratPermohonan(Request $request){
        return view('superadmin.senaraipermohonanmesyuarat',[
                                                    'senarai' => Permohonan::where('fk_idsyor', '=', '1')->get(),
                                                    'stat' => $request->stat
                                                    ]);
    }

    public function ViewPermohonanMesyuarat(Request $request, $idmohon){
        $mohon = Permohonan::where('idpermohonan',$idmohon)->first();
        $peralatan = PembelianPeralatan::where('fk_idpermohonan', $mohon->idpermohonan)->get();
        $jumlaharga = 0;
        $jumlah = 0;

        $pembelian = PembelianPeralatan::where('fk_idpermohonan', '=', $idmohon)->get();

        $syor = GlobalSyor::all();

        $surat = RujukanSurat::where('fk_idpermohonan',$idmohon)->first();


            foreach($pembelian as $beli){
                $jumlaharga += ($beli->hargaseunit * $beli->kuantiti);
            }

        return view('superadmin.viewpermohonan', [
                                            'mohon' => $mohon,
                                            'peralatan' => $peralatan,
                                            'jumlaharga' => $jumlaharga,
                                            'jumlah' => $jumlah,
                                            'syor' => $syor,
                                            'surat' => $surat,
                                            'status' => $request->status
                                                    ]);
    }
}
