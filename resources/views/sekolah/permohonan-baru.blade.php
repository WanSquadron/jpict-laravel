@extends('master.app')

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
 	if($('#nomykad').val().length == 0)
 	{
 		Swal({
  				type: 'error',
  				title: 'Tidak Lengkap!',
  				text: 'Sila Lengkapkan Nombor Mykad Pegawai Bertanggungjawab!',
		});
 		$('#nomykad').focus();
 		return false;
 	}
 	if($('#nohp').val().length == 0)
 	{
 		Swal({
  				type: 'error',
  				title: 'Tidak Lengkap!',
  				text: 'Sila Lengkapkan Nombor Telefon Pegawai Bertanggungjawab!',
		});
 		$('#nohp').focus();
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
  				text: 'Sila Lengkapkan Jumlah Peruntukan Tahun Semasa!',
		});
		$('#jumperuntukan').focus();
		return false;
 	}
 	if($('#bakiperuntukan').val().length == 0)
 	{
 		Swal({
  				type: 'error',
  				title: 'Tidak Lengkap!',
  				text: 'Sila Lengkapkan Baki Peruntukan Tahun Semasa!',
		});
		$('#statbli').focus();
		return false;
 	}
 	return true;
 }


</script>

    	<form data-toggle="validator" role="form" method="post" action="/sekolah/simpan-permohonan/{{ Auth::User()->kodsekolah }}" onsubmit="return ValidateBorang();">
		<div class="row">
            <div class="col-lg-12">						
				<div class="card mb-3">	
					<div class="card-header">
						<i class="fa fa-users"></i>  A. &nbsp;&nbsp;&nbsp;Maklumat Pegawai Bertanggungjawab
					</div>	
					<div class="card-body"> 
						<div class="form-row">   
							<div class="form-group col-md-8">                            
								<label for="example1">Nama Pegawai Bertanggungjawab</label>
							 	<input class="form-control" type="text" name="pegawai" id="pegawai" placeholder="Sila isikan Nama Pegawai Bertanggungjawab">
							 	<input type="hidden" name="kodsek" id="kodsek" value="{{ Auth::User()->kodsekolah }}">
							 	<input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}">
							</div>	
						</div>
						<div class="row">
							<div class="form-group col-md-4">
								<label for="NoMykad">No. Mykad </label>
								<input class="form-control" type="text" name="nomykad" id="nomykad" placeholder="Sila Masukkan Nombor Mykad tanpa '-'" >
							</div>
							<div class="form-group col-md-4">
								<label for="NoTel">No. Telefon</label>
								<input class="form-control" type="text" name="notelfn" id="notelfn" placeholder="Sila Masukkan Nombor Telefon Bimbit tanpa '-'">
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
						<i class="fa fa-folder"></i>   B.&nbsp;&nbsp;&nbsp;Butiran Sumber Kewangan
					</div>						
					<div class="card-body">	
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="NoSurat">Sumber Peruntukan</label>
								<select class="form-control" name="sumberp" id="sumberp" placeholder="Sila pilih Sumber Peruntukan">
									<option value="">Sila Pilih Sumber Peruntukan</option>
									@foreach ($peruntukan as $kew)
										<option value="{{ $kew->idsumberkewangan }}">{{ $kew->nama_sumberkewangan }}</option>
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
									<input class="form-check-input" type="radio" name="tujubli" id="tujubli" value="PdPc">
													PdPc - Pengajaran dan Pemudahcaraan
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="tujubli" id="tujubli" value="PdT">
													PdT - Pengurusan dan Pentadbiran
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="JustifikasiPembelian">Justifikasi Pembelian (Sebab Perlu Dibeli)</label>
								<input class="form-control" type="text" name="justfks" id="justfks" placeholder="Sila isikan Justifikasi Pembelian">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="PeruntukanSemasa">Jumlah Peruntukan Tahun Semasa (RM)</label>
								<input class="form-control" type="text" name="jumperuntukan" placeholder="Sila isikan Jumlah Peruntukan Yang Diterima. cth : 1500.00">
							</div>
							<div class="form-group col-md-6">
								<label for="BakiSemasa">Baki Peruntukan Tahun Semasa</label>
								<input class="form-control" type="text" name="bakiperuntukan" placeholder="Sila isikan Baki Peruntukan Tahun Semasa. cth : 1800.00">
							</div>
						</div>								
					</div>
				</div>
			</div>
		</div>

		<div class="row">
	        <div class="col-lg-12">						
				<div class="card mb-3">	
					<div class="card-header">
						<i class="fa fa-users"></i>  C. &nbsp;&nbsp;&nbsp;Maklumat No. Rujukan Dokumen
					</div>	
					<div class="card-body"> 
						<div class="form-row">   
							<div class="form-group col-lg-8">                            
								<label for="SuratIringan">No. Rujukan Surat Iringan Permohonan JPICT</label>
							 	<input class="form-control" type="text" name="surat_iringan" id="surat_iringan" placeholder="Sila isikan No. Rujukan Surat Iringan">
							</div>	
						</div>
						<div class="form-row">
							<div class="form-group col-lg-8">
								<label for="SuratKelulusanGuna">No. Rujukan Surat Kelulusan Guna Peruntukan </label>
								<input class="form-control" type="text" name="surat_kelulusan_guna" id="surat_kelulusan_guna" placeholder="Sila isikan No. Rujukan Surat Kelulusan Penggunaan Peruntukan" >
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-lg-8">
								<label for="MinitMesyuarat">No. Rujukan Minit Mesyuarat Kelulusan Guna Peruntukan (SUWA shj)</label>
								<input class="form-control" type="text" name="minit_mesyuarat" id="minit_mesyuarat" placeholder="Sila isikan No. Rujukan Minit Mesyuarat">
							</div>
						</div>
	                </div>
				</div>	<!-- end card body -->	
			</div>
		</div>



		<input class="btn btn-primary" type="submit" name="submit" value="Seterusnya">

	</form>
</div>


@endsection 
<!-- End Section Main Content -->