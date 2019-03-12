

@extends('master.app')

@section('content')

<h3>Sistem Jawatankuasa Pemandu ICT Maklumat Negeri Perak<br/></h3><hr/>
    <h4>Selamat Datang {{ ucwords(strtolower(Auth::User()->name)) }}!</h4>
<br/>
<div class="row">
    <div class="col-lg-12">
        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
            <div class="au-card-title" style="background-image:url('bootstrap/images/bg-title-01.jpg');">
                <div class="bg-overlay bg-overlay--blue"></div>
                <h3>
                    <i class="zmdi zmdi-comment-text"></i>Tatacara Permohonan</h3>
            </div>
            <div class="au-task js-list-load">
                <div class="au-task__title">
                    <p class="btn btn-danger">Perkara Wajib untuk diberi perhatian</p>
                </div>
                <div class="au-task-list js-scrollbar5">
                    <div class="au-task__item au-task__item--danger">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="">Pemohon perlu memastikan Maklumat Profil Sekolah telah dilengkapkan dengan maklumat terkini. Maklumat tersebut boleh didapati dari Menu Profil anda dipenjuru kanan atas dibawah <b><i>"Menu Profil"</i></b>.</a>
                            </h5>
                            <span class="time">Langkah 1</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--warning">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="">Sebelum melakukan permohonan secara atas talian, pemohon perlu memastikan segala dokumen sokongan telah mendapat kelulusan. Dokumen tersebut mestilah <i><b>"diimbas/scan"</b></i> dan disimpan dalam format .pdf . Lain-lain format tidak akan diterima oleh sistem ini.</a>
                            </h5>
                            <span class="time">langkah 2</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--primary">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="">Hanya permohonan yang lengkap dengan dokumen sokongan yang diwajibkan dan permohonan yang barangannya belum dibeli sahaja akan diproses bagi mendapatkan kelulusan JPICT. Mana-mana permohonan yang tidak lengkap dan barangnya telah dibeli tidak akan diproses.</a>
                            </h5>
                            <span class="time">langkah 3</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--success">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="">Sebarang keputusan berkenaan kelulusan akan dimaklumkan oleh Jawatankuasa melalui surat kepada pemohon.</a>
                            </h5>
                            <span class="time">tamat</span>
                        </div>
                    </div>
                    <div class="au-task__item au-task__item--danger">
                        <div class="au-task__item-inner">
                            <h5 class="task">
                                <a href="">Hanya permohonan yang lengkap dengan dokumen sokongan yang diwajibkan dan permohonan yang barangannya belum dibeli sahaja akan diproses bagi mendapatkan kelulusan JPICT. Mana-mana permohonan yang tidak lengkap dan barangnya telah dibeli tidak akan diproses.</a>
                            </h5>
                            <span class="time">langkah 3</span>
                        </div>
                    </div>
                </div>
                <div class="au-task__footer">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

