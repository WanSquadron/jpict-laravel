@extends('master.app')


<!-- End Section Statistic -->
@section('content')

@section('js')

<script type="text/javascript">

@if ($status == 'success')    

    Swal({
                type: 'success',
                title: 'Kemaskini',
                text: 'Maklumat Profil berjaya disimpan'
        });
@endif
</script>
@endsection

        <div class="table-responsive m-b-40">
            <div class="table-data__tool-right">
            <a href="/sekolah/profil/{{ Auth::User()->kodsekolah }}">
            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-edit"></i>kemaskini profil
            </button></a>
        </div><br>
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th class="text-left" colspan=3>Maklumat Profil Sekolah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-left">
                        <td class="text-left">Nama Sekolah</td>
                        <td class="text-left">:</td>
                        <td class="text-left">{{ Auth::User()->name }} ( {{Auth::User()->kodsekolah }} )</td>
                    </tr>
                    <tr class="text-left">
                        <td class="text-left">Alamat Sekolah</td>
                        <td class="text-left">:</td>
                        <td class="text-left">{{ Auth::User()->alamat }}</td>
                    </tr>
                    <tr class="text-left">
                        <td class="text-left">Daerah</td>
                        <td class="text-left">:</td>
                        <td class="text-left">{{ Auth::User()->fk_kodppd }}</td>
                    </tr>
                    <tr class="text-left">
                        <td class="text-left">Poskod</td>
                        <td class="text-left">:</td>
                        <td class="text-left">{{ Auth::User()->poskod }}</td>
                    </tr>
                    <tr class="text-left">
                        <td class="text-left">No.Telefon</td>
                        <td class="text-left">:</td>
                        <td class="text-left">{{ Auth::User()->notelsekolah }}</td>
                    </tr>
                    <tr class="text-left">
                        <td class="text-left">No. Faks</td>
                        <td class="text-left">:</td>
                        <td class="text-left">{{ Auth::User()->nofaksekolah }}</td>
                    </tr>
                    <tr class="text-left">
                        <td class="text-left">Alamat Emel Rasmi (1GovUc)</td>
                        <td class="text-left">:</td>
                        <td class="text-left">{{ Auth::User()->email }}</td>
                    </tr>
                </tbody>
             </table>
    

    <div class="modal fade" id="pengumuman" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="largeModalLabel">Pemberitahuan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Tatacara Permohonan Secara atas talian JPICT JPN Perak :- <br><br><br>
                                1.&nbsp;&nbsp; Sila pastikan Maklumat Profil anda lengkap dan betul. Jika perlu dikemaskini, sila klik butang <b>"Kemaskini Profil"</b> untuk mengemaskini maklumat terkini.<br><br>
                                2.&nbsp;&nbsp; Sila pastikan kesemua dokumen wajib bagi permohonan telah lengkap diimbas dalam bentuk digital (Fail pdf) bagi memudahkan proses muatnaik dokumen sokongan.<br>

                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>

@endsection
