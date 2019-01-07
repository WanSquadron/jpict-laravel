


<!-- Include template from app.blade.php -->
@extends('master.app')

<!-- Start Section Breadcrumbs -->
@section('breadcrumb')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="au-breadcrumb-content">
                    <div class="au-breadcrumb-left">
                        <span class="au-breadcrumb-span">Anda di Ruangan:</span>
                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                            <li class="list-inline-item active">
                                <a href="#">Permohonan</a>
                            </li>
                            <li class="list-inline-item seprate">
                            	<span>/</span>
                            </li>
                            <li class="list-inline-item">Permohonan Baru</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- End Section Breadcrumbs -->

<!-- Start Section Statistic -->
@section('statistic')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
         	<div class="col-md-6 col-lg-3">
                <div class="statistic__item">
                    <h2 class="number">10,368</h2>
                    <span class="desc">members online</span>
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                        </div>
                </div>
            </div>
           	<div class="col-md-6 col-lg-3">
                <div class="statistic__item">
                    <h2 class="number">388,688</h2>
                        <span class="desc">items sold</span>
                            <div class="icon">
                               	<i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item">
                    <h2 class="number">1,086</h2>
                    <span class="desc">this week</span>
                        <div class="icon">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item">
                    <h2 class="number">$1,060,386</h2>
                        <span class="desc">total earnings</span>
                            <div class="icon">
                                <i class="zmdi zmdi-money"></i>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- End Section Statistic -->

<!-- Start Section Main Content -->
@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
    	<form data-toggle="validator" role="form" method="post" action="/daftar-permohonan">
		<div class="row">
            <div class="col-lg-12">						
				<div class="card mb-3">	
					<div class="card-header">
						<i class="fa fa-users"></i> <b>  A.  Maklumat Sekolah & Pegawai Bertanggungjawab</b>
					</div>	
					<div class="card-body"> 
						<div class="form-row">   
							<div class="form-group col-md-6">                            
								<label for="example1">Kod Sekolah / Nama Sekolah</label>
							 	<input class="form-control" type="text" placeholder="AEA2044 / SMK Gunung Rapat" readonly>
							 	<input class="form-control" type="hidden" name="kodsklh" value="AEA2044">
							 	<input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}">
							</div>	
							<div class="form-group col-md-6">
								<label for="alamat">Alamat</label>
								<input class="form-control" type="text" placeholder="Jln Teoh Kim Swee, 31350 Ipoh Perak" readonly>
							</div>
							<div class="form-group col-md-6">
								<lable for="daerah">Daerah</lable>
								<input class="form-control" type="text" placeholder="Kinta Utara" readonly>
							</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<lable for="NamaPegawai">Nama Pegawai Bertanggungjawab</lable>
									<input class="form-control" type="text" name="pegawai" placeholder="Sila isikan Nama Pegawai Bertanggungjawab" >
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="NoTel">No. Telefon Pejabat / HP </label>
									<input class="form-control" type="text" name="notepon" placeholder="Sila isikan No. Telefon">
								</div>
							<div class="form-group col-md-4">
								<label for="faks">No. Faks</label>
								<input class="form-control" type="text" name="nomfaks" placeholder="Sila isikan No. Faks">
							</div>
							<div class="form-group col-md-4">
								<label for="Email">Alamat Email Rasmi</label>
								<input class="form-control" type="text" name="almtmel" placeholder="Sila isikan Alamat Email Rasmi">
							</div>
	                    </div>
					</div>	<!-- end card body -->	
				</div>
			</div>
		</div>


        <div class="row">
            <div class="col-md-12">						
				<div class="card mb-3">
					<div class="card-header">
						<h4><i class="fa fa-folder"></i>   B.  Butiran Permohonan</h4>
					</div>						
					<div class="card-body">	
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="NoSurat">Sumber Peruntukan</label>
								<select class="form-control" name="sumberp" placeholder="Sila pilih Sumber Peruntukan">
									<option value="">Sila pilih Sumber Peruntukan...</option>
									@foreach ($peruntukan as $kew)
									<option value="{{ $kew->per_codeduit }}"> {{ $kew->per_deskrips }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="TarikhSuratRujukan">Keterangan Sumber Peruntukan</label>
								<input class="form-control" type="text" name="sumdesc" placeholder="Sila isikan Keterangan Sumber Peruntukan" >
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="TujuanPembelian">Tujuan Pembelian</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="tujubli" id="tujubli" value="PdP">
													PdP - Pengajaran dan Pembelajaran
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="tujubli" id="tujubli" value="PnT">
													Pentadbiran
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="JustifikasiPembelian">Justifikasi Pembelian (Sebab Perlu Dibeli)</label>
								<input class="form-control" type="text" name="justfks" placeholder="Sila isikan Justifikasi Pembelian">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="HargaPembelian">Harga Pembelian (RM)</label>
								<input class="form-control" type="text" name="hrgabli" placeholder="Sila isikan Harga Pembelian">
							</div>
							<div class="form-group col-md-4">
								<label for="Status Pembelian">Status Pembelian</label>
								<select class="form-control" name="statbli">
									<option value="">Sila pilih Status Pembelian</option>
									<option value="Sudah">Telah Dibeli</option>
									<option value="Belum">Belum Dibeli</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="TahunBeli">Tahun Dibeli (Jika peralatan TELAH DIBELI)</label>
								<input class="form-control" type="text" name="tahunbl" placeholder="Sila isi Tahun Dibeli">
							</div>
						</div>
							<input type="hidden" name="action" id="action" value="daftar">
							<input class="btn btn-primary" type="submit" name="submit" value="Seterusnya">
					</div>
				</div>
			</div>
		</div>
	</form>
	</div>
</div>
@endsection <!-- End Section Main Content -->