

@if(Auth::user()->role == 'Sekolah')
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

@section('jquery')

@endsection
<!-- Start Section Main Content -->
@section('content')




<script type="text/javascript">


 function ValidateBorang() 
 {
 	if($('#pegawai').val().length == 0)
 	{
 		Swal({
  				type: 'error',
  				title: 'Tidak Lengkap!',
  				text: 'Sila Lengkapkan Nama Pegawai Bertanggungjawab!',
		});
 		$('#pegawai').focus();
 		return false;
 	}
 	if($('#sumberp').val().length == 0)
 	{
 		Swal({
  				type: 'error',
  				title: 'Tidak Lengkap!',
  				text: 'Sila Lengkapkan Sumber Peruntukan Kewangan!',
		});
		$('#sumberp').focus();
		return false;
 	}
 	if($('#tujubli').val().length == 0)
 	{
 		Swal({
  				type: 'error',
  				title: 'Tidak Lengkap!',
  				text: 'Sila Lengkapkan Tujuan Pembelian!',
		});
		$('#tujubli').focus();
		return false;
 	}
 	if($('#justfks').val().length == 0)
 	{
 		Swal({
  				type: 'error',
  				title: 'Tidak Lengkap!',
  				text: 'Sila Lengkapkan Justifikasi Pembelian!',
		});
		$('#justfks').focus();
		return false;
 	}
 	if($('#hrgabli').val().length == 0)
 	{
 		Swal({
  				type: 'error',
  				title: 'Tidak Lengkap!',
  				text: 'Sila Lengkapkan Harga Pembelian!',
		});
		$('#hrgabli').focus();
		return false;
 	}
 	if($('#statbli').val().length == 0)
 	{
 		Swal({
  				type: 'error',
  				title: 'Tidak Lengkap!',
  				text: 'Sila Lengkapkan Status Pembelian!',
		});
		$('#statbli').focus();
		return false;
 	}
 	return true;
 }


</script>

<div class="section__content section__content--p30">
    <div class="container-fluid">
    	<form data-toggle="validator" role="form" method="post" action="/sekolah/simpan-permohonan" onsubmit="return ValidateBorang();">
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
							 	<input class="form-control" type="text" value="{{ $maklumat->kodsekolah }} - {{ $maklumat->name }}" readonly>
							 	<input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}">
							</div>	
							<div class="form-group col-md-6">
								<label for="alamat">Alamat</label>
								<input class="form-control" type="text" placeholder="Sila isikan Alamat" >
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
									<label for="Poskod">Poskod </label>
									<input class="form-control" type="text" name="poskod" id="poskod" value="{{ $maklumat->poskod }}">
								</div>
							<div class="form-group col-md-4">
								<label for="Daerah">Daerah</label>
								<input class="form-control" type="text" name="daerah" id="daerah" value="{{ $maklumat->ppd }}">
							</div>
							<div class="form-group col-md-4">
								<label for="Negeri">Negeri</label>
								<input class="form-control" type="text" name="negeri" id="negeri" value="Perak">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
									<label for="NoTel">No. Telefon Pejabat / HP </label>
									<input class="form-control" type="text" name="notepon" id="notepon" value="{{ $maklumat->notel }}">
								</div>
							<div class="form-group col-md-4">
								<label for="faks">No. Faks</label>
								<input class="form-control" type="text" name="nomfaks" id="nomfaks" value="{{ $maklumat->nofaks }}">
							</div>
							<div class="form-group col-md-4">
								<label for="Email">Alamat Email Rasmi</label>
								<input class="form-control" type="text" name="almtmel" id="almtmel" value="{{ $maklumat->email }}">
							</div>
						</div>
						<div class="form-row">
								<div class="form-group col-md-6">
									<lable for="NamaPegawai">Nama Pegawai Bertanggungjawab</lable>
									<input class="form-control" type="text" name="pegawai" id="pegawai" placeholder="Sila isikan Nama Pegawai Bertanggungjawab" autofocus>
								</div>
							</div>
	                    </div>
					</div>	<!-- end card body -->	
				</div>
			</div>
		</div>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">						
				<div class="card mb-3">
					<div class="card-header">
						<h4><i class="fa fa-folder"></i>   B.  Butiran Sumber Kewangan</h4>
					</div>						
					<div class="card-body">	
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="NoSurat">Sumber Peruntukan</label>
								<select class="form-control" name="sumberp" id="sumberp" placeholder="Sila pilih Sumber Peruntukan">
									<option value="">Sila pilih Sumber Peruntukan...</option>
									@foreach ($peruntukan->where('parent_id', '0')->all() as $kew)
										<optgroup label="{{ $kew->per_deskrips }}">
											@foreach ($peruntukan->where('parent_id', $kew->per_codeduit)->all() as $kew_child)
												<optgroup label="&nbsp; &nbsp; {{ $kew_child->per_deskrips }}">
													@foreach ($peruntukan->where('parent_id', $kew_child->per_codeduit)->all() as $kew_grandchild)
													<option value="{{ $kew_grandchild->per_codeduit }}">&nbsp; &nbsp;{{ $kew_grandchild->per_deskrips }}</option>
													@endforeach
												</optgroup>
											@endforeach
										</optgroup>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="TarikhSuratRujukan">Keterangan Sumber Peruntukan</label>
								<input class="form-control" type="text" name="sumdesc" id="sumdesc" placeholder="Sila isikan Keterangan Sumber Peruntukan" >
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
									<input class="form-check-input" type="radio" name="tujubli" id="tujubli" value="PdT">
													PdT - Pentadbiran
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="JustifikasiPembelian">Justifikasi Pembelian (Sebab Perlu Dibeli)</label>
								<input class="form-control" type="text" name="justfks" id="justfks" placeholder="Sila isikan Justifikasi Pembelian">
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
							<input class="btn btn-primary" type="submit" name="submit" value="Seterusnya" nofocus>				
						</div>
					</div>
				</div>
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">						
				<div class="card mb-3">	
					<div class="card-header">
						<i class="fa fa-users"></i> <b>  C.  Muatnaik Dokumen</b>
					</div>	
					<div class="card-body"> 
						<div class="form-row">   
							<div class="form-group col-md-6">                            
								<label for="example1">Sebutharga Syarikat</label>
							 	<button type="button" id="btn-quot" class="btn btn-sm btn-primary">
                                    <i class="fa fa-user push-5-r"></i>Pilih Fail
                                </button>
							</div>	
							<div class="form-group col-md-6">
								<label for="alamat">Alamat</label>
								<input class="form-control" type="text" placeholder="Sila isikan Alamat" >
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
									<label for="Poskod">Poskod </label>
									<input class="form-control" type="text" name="poskod" id="poskod" value="{{ $maklumat->poskod }}">
								</div>
							<div class="form-group col-md-4">
								<label for="Daerah">Daerah</label>
								<input class="form-control" type="text" name="daerah" id="daerah" value="{{ $maklumat->ppd }}">
							</div>
							<div class="form-group col-md-4">
								<label for="Negeri">Negeri</label>
								<input class="form-control" type="text" name="negeri" id="negeri" value="Perak">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
									<label for="NoTel">No. Telefon Pejabat / HP </label>
									<input class="form-control" type="text" name="notepon" value="{{ $maklumat->notel }}">
								</div>
							<div class="form-group col-md-4">
								<label for="faks">No. Faks</label>
								<input class="form-control" type="text" name="nomfaks" value="{{ $maklumat->nofaks }}">
							</div>
							<div class="form-group col-md-4">
								<label for="Email">Alamat Email Rasmi</label>
								<input class="form-control" type="text" name="almtmel" value="{{ $maklumat->email }}">
							</div>
						</div>
						<div class="form-row">
								<div class="form-group col-md-6">
									<lable for="NamaPegawai">Nama Pegawai Bertanggungjawab</lable>
									<input class="form-control" type="text" name="pegawai" id="pegawai" placeholder="Sila isikan Nama Pegawai Bertanggungjawab">
								</div>
							</div>
	                    </div>
					</div>	<!-- end card body -->	
				</div>
			</div>
		</div>
			</form>
		</div>
	</div>
@endsection <!-- End Section Main Content -->
@endif