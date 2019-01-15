

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

<!-- Start Section Main Content -->
@section('content')

<script>
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
							<i class="fa fa-users"></i> <b>  A.  Peruntukan Kewangan</b>
						</div>	
						<div class="card-body"> 
							<div class="form-row">   
								<div class="form-group col-md-6">                            
								 	<select class="form-group" name="sumberkewangan" id="sumberkewangan">
								 		<option value="">Sila Pilih Sumber Kewangan...</option>
								 		@foreach($peruntukan as $sumber)
								 		<option value="{{ $sumber->per_codeduit }}">{{ $sumber->per_deskrips }}</option>
								 		@endforeach
								 	</select>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection <!-- End Section Main Content -->
@endif