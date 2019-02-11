

<!-- Include template from app.blade.php -->
@extends('master.app')

@section('css')
<link href="{{ asset('bootstrap/vendor/dropzone/dropzone.min.css') }}" rel="stylesheet">
<link href="{{ asset('bootstrap/vendor/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection

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
                            <li class="list-inline-item seprate">
                            	<span>/</span>
                            </li>
                            <li class="list-inline-item">Muatnaik Dokumen</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<!-- End Section Breadcrumbs -->

<!-- Start Section JavaScript -->
@section('js')

<script src="{{ asset('bootstrap/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('bootstrap/dropzone/dropzone-config.js') }}"></script>
<script src="{{ asset('bootstrap/dropzone/dropzone.min.js') }}"></script>

@endsection
<!-- End Section Javascript -->

<!-- Start Section Main Content -->
@section('content')

@if ($kew == 1)
<div class="section__content section__content--p30">
    <div class="container-fluid">
    	<form data-toggle="validator" class="dropzone" role="form" enctype="multipart/form-data" method="post" action="/sekolah/upload-dokumen">
    	{{ csrf_field() }}    
		<div class="row">
            <div class="col-lg-12">						
				<div class="card mb-3">	
					<div class="card-header">
						<i class="fa fa-users"></i> <b>  C.  MuatNaik Dokumen Sokongan</b>
					</div>	
					<div class="card-body"> 
						<div class="form-row">   
							<div class="form-group col-md-6">                        
								<label for="example1">1. Surat dan Kertas Permohonan JPICT :</label><br>
							 	<button id="wk_doc_1" class="btn btn-primary" type="button">Muatnaik</button><br>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">                            
								<label for="example1">2. Lampiran Kedudukan Kewangan Sekolah :</label><br>
							 	<button id="wk_doc_2" class="btn btn-primary" type="button">Muatnaik</button><br>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">                            
								<label for="example1">3. Surat Kelulusan Penggunaan Peruntukan :</label><br>
							 	<button id="wk_doc_3" class="btn btn-primary" type="button">Muatnaik</button><br>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">                            
								<label for="example1">4. Minit Mesyuarat Persetujuan Penggunaan Peruntukan :</label><br>
							 	<button id="wk_doc_4" class="btn btn-primary" type="button">Muatnaik</button><br>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">                            
								<label for="example1">5. Tiga (3) Sebutharga daripada Syarikat :</label><br>
							 	<button id="wk_doc_5" class="btn btn-primary" type="button">Muatnaik</button><br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>

@elseif ($kew == 2)

<!-- Wang Kerajaan-->

<div class="section__content section__content--p30">
    <div class="container-fluid">
    	<form data-toggle="validator" role="form" method="post" action="/sekolah/upload-dokumen">
		<div class="row">
            <div class="col-lg-12">						
				<div class="card mb-3">	
					<div class="card-header">
						<i class="fa fa-users"></i> <b>  C.  MuatNaik Dokumen Sokongan</b>
					</div>	
					<div class="card-body"> 
						<div class="form-row">   
							<div class="form-group col-md-6">                            
								<label for="example1">1. Surat dan Kertas Permohonan JPICT :</label><br>
							 	<button id="wk_doc_1" class="btn btn-primary" type="button">Muatnaik</button><br>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">                            
								<label for="example1">2. Lampiran Kedudukan Kewangan Sekolah :</label><br>
							 	<button id="wk_doc_2" class="btn btn-primary" type="button">Muatnaik</button><br>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">                            
								<label for="example1">3. Minit Mesyuarat Persetujuan Penggunaan Peruntukan :</label><br>
							 	<button id="wk_doc_3" class="btn btn-primary" type="button">Muatnaik</button><br>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">                            
								<label for="example1">4. Tiga (3) Sebutharga daripada Syarikat :</label><br>
							 	<button id="wk_doc_4" class="btn btn-primary" type="button">Muatnaik</button><br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
@endif
@endsection	