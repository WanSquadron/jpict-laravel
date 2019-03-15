@extends('master.app')

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
                            <li class="list-inline-item">Kemaskini Permohonan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')


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
 	 	if($('#surat_iringan').val().length == 0)
 	{
 		Swal({
  				type: 'error',
  				title: 'Tidak Lengkap!',
  				text: 'Sila Lengkapkan No Rujukan Surat Iringan!',
		});
		$('#surat_iringan').focus();
		return false;
 	}
 	 	if($('#surat_kelulusan_guna').val().length == 0)
 	{
 		Swal({
  				type: 'error',
  				title: 'Tidak Lengkap!',
  				text: 'Sila Lengkapkan Baki Peruntukan Tahun Semasa!',
		});
		$('#surat_kelulusan_guna').focus();
		return false;
 	}
 	 	if($('#minit_mesyuarat').val().length == 0)
 	{
 		Swal({
  				type: 'error',
  				title: 'Tidak Lengkap!',
  				text: 'Sila Lengkapkan Baki Peruntukan Tahun Semasa!',
		});
		$('#minit_mesyuarat').focus();
		return false;
 	}
 	return true;
 }


</script>

@endsection

@section('content')

<div class="section__content section__content--p30">
    <div class="container-fluid">
    	<form data-toggle="validator" role="form" method="post" action="/sekolah/permohonan/kemaskini/peralatan/{{ $maklumat->idpermohonan }}" onsubmit="return ValidateBorang();">
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
							 	<input class="form-control" type="text" name="pegawai" id="pegawai" placeholder="Sila isikan Nama Pegawai Bertanggungjawab" value="{{ $maklumat->pegawaitanggungjawab }}">
							 	<input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}">
							</div>	
						</div>
						<div class="row">
							<div class="form-group col-md-4">
								<label for="NoMykad">No. Mykad </label>
								<input class="form-control" type="text" name="nomykad" id="nomykad" placeholder="Sila Masukkan Nombor Mykad tanpa '-'" value="{{ $maklumat->mykadpegawai }}" >
							</div>
							<div class="form-group col-md-4">
								<label for="NoTel">No. Telefon</label>
								<input class="form-control" type="text" name="notelfn" id="notelfn" placeholder="Sila Masukkan Nombor Telefon Bimbit tanpa '-'" value="{{ $maklumat->notelpegawai }}">
							</div>
	                    </div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="container-fluid">
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
										<option value="{{ $kew->idsumberkewangan }}"
											@if( $kew->idsumberkewangan == $maklumat->fk_idsumberkewangan)
												selected
											@endif
											>{{ $kew->nama_sumberkewangan }}</option>
									@endforeach		
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="TarikhSuratRujukan">Keterangan Sumber Peruntukan</label>
								<input class="form-control" type="text" name="sumdesc" id="sumdesc" placeholder="Sila isikan Keterangan Sumber Peruntukan" value="{{ $maklumat->keterangan }}" >
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="TujuanPembelian">Tujuan Pembelian</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="tujubli" id="tujubli" value="PdPc"
										@if($maklumat->tujuanbeli == "PdPc")
											checked
										@endif
										>PdPc - Pengajaran dan Pemudahcaraan
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="tujubli" id="tujubli" value="PdT"
									@if($maklumat->tujuanbeli == "PdT")
											checked
										@endif
										>PdT - Pengurusan dan Pentadbiran
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="JustifikasiPembelian">Justifikasi Pembelian (Sebab Perlu Dibeli)</label>
								<input class="form-control" type="text" name="justfks" id="justfks" placeholder="Sila isikan Justifikasi Pembelian" value="{{ $maklumat->justifikasi }}">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="PeruntukanSemasa">Jumlah Peruntukan Tahun Semasa (RM)</label>
								<input class="form-control" type="text" name="jumperuntukan" placeholder="Sila isikan Jumlah Peruntukan Yang Diterima. cth : 1500.00" value="{{ $maklumat->jumlahwang }}">
							</div>
							<div class="form-group col-md-6">
								<label for="BakiSemasa">Baki Peruntukan Tahun Semasa</label>
								<input class="form-control" type="text" name="bakiperuntukan" placeholder="Sila isikan Baki Peruntukan Tahun Semasa. cth : 1800.00" value="{{ $maklumat->bakiwang }}">
							</div>
						</div>								
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
	        <div class="col-lg-12">						
				<div class="card mb-3">	
					<div class="card-header">
						<i class="fa fa-users"></i>  C. &nbsp;&nbsp;&nbsp;Maklumat No. Rujukan Dokumen
					</div>	
					<div class="card-body"> 
						<div class="form-row">   
							<div class="form-group col-md-4">  

								<label for="SuratIringan">No. Rujukan Surat Iringan Permohonan JPICT</label>
							 	<input class="form-control" type="text" name="surat_iringan" id="surat_iringan" placeholder="Sila isikan No. Rujukan Surat Iringan" value="{{ $surat_iringan->no_rujukan }}">
							</div>	
							<div class="form-group col-md-4">
								<label for="SuratKelulusanGuna">No. Rujukan Surat Kelulusan Guna Peruntukan </label>
								<input class="form-control" type="text" name="surat_kelulusan_guna" id="surat_kelulusan_guna" placeholder="Sila isikan No. Rujukan Surat Kelulusan Penggunaan Peruntukan" value="{{ $surat_kelulusan->no_rujukan }}">
							</div>
							<div class="form-group col-md-4">
								<label for="MinitMesyuarat">No. Rujukan Minit Mesyuarat</label>
								<input class="form-control" type="text" name="minit_mesyuarat" id="minit_mesyuarat" placeholder="Sila isikan No. Rujukan Minit Mesyuarat" value="{{ $minit_mesyuarat->no_rujukan }}">
							</div>
	                	</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<input class="btn btn-primary" type="submit" name="submit" value="Seterusnya">
	</div>
	</form>
</div>

@endsection 