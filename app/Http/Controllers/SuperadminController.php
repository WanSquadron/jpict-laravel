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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

    public function SaveKelulusan(Request $request, $idmohon)
    {

       $kira_alat = PembelianPeralatan::where('fk_idpermohonan', $idmohon)->get();
       foreach($kira_alat as $kira) {
            $kuantitilulus = htmlentities($request->input('kuantitilulus'.$kira->id),ENT_QUOTES);
            $kuantitigagal = htmlentities($request->input('kuantitigagal'.$kira->id),ENT_QUOTES);

            $simpan = PembelianPeralatan::find($kira->id);
            $simpan->kuantiti_lulus = $kuantitilulus;
            $simpan->kuantiti_gagal = $kuantitigagal;
            $simpan->save();

       }

       return redirect('superadmin/mesyuarat/permohonan/'.$idmohon.'/?status=success');

       
    }

    public function EmelTerimaPermohonan(Request $r, $idmohon)
    {


        # PHP MAILER
        # ------------------------
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->Username = "syazwan.shahferi@gmail.com";
        $mail->Password = "dhianurliSSa8688";
        $mail->From = "syazwan.shahferi@gmail.com";
        $mail->FromName = "Mohd Syazwan Bin M Shahferi";
        $mail->addAddress("syazwan.shahferi@moe.gov.my");
        $mail->isHTML(true);
        $mail->Subject = "Surat Makluman Penerimaan Borang Permohonan JPICT";
        $mail->Body = "Assalamualaikum & Salam Sejahtera. Salam Perak Excellent. Salam ICT Excellent.<br><br>Borang Permohonan bagi mendapatkan Kelulusan JPICT Negeri Perak telah diterima oleh kami.<br><br>Oleh yang demikian, permohonan ini akan dibawa ke mesyuarat terdekat bagi mendapatkan kelulusan. Surat makluman tentang kelulusan akan diberitahu kelak. <br>Sekian, terima kasih.<br><br><br><br><hr/><small>Surat ini dijana secara automatik daripada Sistem Pengurusan JPICT JPN Perak, tiada tandatangan diperlukan.</small>";
        if (!$mail->send()) {
            echo "swal('error','Ops !','Terdapat ralat semasa penghantaran e-mel !<br><br><b>Nota :<br></b> Sila pastikan kata laluan anda yang betul serta semak <a target=\'_blank\' href=\'https://www.google.com/settings/security/lesssecureapps\'><b>https://www.google.com/settings/security/lesssecureapps</b></a> dan Pilih <b>\'Turn on\'</b> dan cuba semula.'); ";
        } else {
            echo "SweetAlert('success','Berjaya !','Rekod tugasan harian telah berjaya diemelkan !');";
        }
    }
}
