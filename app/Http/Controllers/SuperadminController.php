<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Permohonan;
use App\GlobalMesyuarat;
use App\PembelianPeralatan;

class SuperadminController extends Controller
{
    public function SenaraiPermohonan(Request $request)
    {
    	$status = 0;
    	return view('superadmin.senaraipermohonan',[
    												'senarai' => Permohonan::all(),
    												'status' => $status
    												]);
    }

    public function SenaraiMesyuarat(Request $request)
    {
    	return view('superadmin.senaraimesyuarat',['mesyuarat' => GlobalMesyuarat::all()]);

    }

    public function ViewPermohonan(Request $request, $idmohon)
    {
    	$mohon = Permohonan::where('idpermohonan',$idmohon)->first();
    	$peralatan = PembelianPeralatan::where('fk_idpermohonan', $mohon->idpermohonan)->get();
    	$jumlaharga = 0;
        $jumlah = 0;

        $pembelian = PembelianPeralatan::where('fk_idpermohonan', '=', $idmohon)->get();

            foreach($pembelian as $beli)
            {
                $jumlaharga += ($beli->hargaseunit * $beli->kuantiti);
            }

    	return view('superadmin.paparpermohonan', [
    										'mohon' => $mohon,
    										'peralatan' => $peralatan,
    										'jumlaharga' => $jumlaharga,
                        					'jumlah' => $jumlah
    												]);
    }
}
