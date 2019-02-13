@extends('master.app')

@section('css')
<link href="{{ asset('bootstrap/vendor/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection

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

@section('js')

<script src="{{ asset('bootstrap/vendor/dropzone/dropzone.min.js') }}"></script>

@endsection

@section('jquery')

var Upload_SuratIringanMohon = $('#wk_doc_1').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "surat-iringan",
        _nomohon: "{{ $id }}"
    },
    acceptedFiles: 'application/pdf',
    maxFilesize: 2,
    maxFiles: 1,
    createImageThumbnails: false,
    previewTemplate : '<div style="display:none"></div>',
    init: function()
    {
        this.on("processing", function(file) {
            $("#wk_doc_1").attr("disabled","disabled");
            $("#wk_doc_1_processing").html('Sila tunggu sebentar...');
        });
        this.on("success", function(file) {
            var ret = file.xhr.response;
            var txt = ret.split('|');
            if (txt[0] == "OK") {
                $("#wk_doc_1").removeAttr("disabled");
                $("#wk_doc_1_processing").html('Dokumen berjaya dimuatnaik.');

            } else {
                alert('Error: ' + txt[0]);
            }
        });
        this.on("complete", function() {
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
        this.removeAllFiles();
            }
        });
        this.on("error", function(file, errorMessage) {
            console.log(errorMessage);
        });
    }
});

var Upload_KedudukanKewangan = $('#wk_doc_2').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "surat-kedudukankewangan",
        _nomohon: "{{ $id }}"
    },
    acceptedFiles: 'application/pdf',
    maxFilesize: 2,
    maxFiles: 1,
    createImageThumbnails: false,
    previewTemplate : '<div style="display:none"></div>',
    init: function()
    {
        this.on("processing", function(file) {
            $("#wk_doc_2").attr("disabled","disabled");
            $("#wk_doc_2_processing").html('Sila tunggu sebentar...');
        });
        this.on("success", function(file) {
            var ret = file.xhr.response;
            var txt = ret.split('|');
            if (txt[0] == "OK") {
                $("#wk_doc_2").removeAttr("disabled");
                $("#wk_doc_2_processing").html('Dokumen berjaya dimuatnaik.');

            } else {
                alert('Error: ' + txt[0]);
            }
        });
        this.on("complete", function() {
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
        this.removeAllFiles();
            }
        });
        this.on("error", function(file, errorMessage) {
            console.log(errorMessage);
        });
    }
});

var Upload_KelulusanPeruntukan = $('#wk_doc_3').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "surat-kelulusangunaperuntukan",
        _nomohon: "{{ $id }}"
    },
    acceptedFiles: 'application/pdf',
    maxFilesize: 2,
    maxFiles: 1,
    createImageThumbnails: false,
    previewTemplate : '<div style="display:none"></div>',
    init: function()
    {
        this.on("processing", function(file) {
            $("#wk_doc_3").attr("disabled","disabled");
            $("#wk_doc_3_processing").html('Sila tunggu sebentar...');
        });
        this.on("success", function(file) {
            var ret = file.xhr.response;
            var txt = ret.split('|');
            if (txt[0] == "OK") {
                $("#wk_doc_3").removeAttr("disabled");
                $("#wk_doc_3_processing").html('Dokumen berjaya dimuatnaik.');

            } else {
                alert('Error: ' + txt[0]);
            }
        });
        this.on("complete", function() {
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
        this.removeAllFiles();
            }
        });
        this.on("error", function(file, errorMessage) {
            console.log(errorMessage);
        });
    }
});

var Upload_MinitMesyuarat = $('#wk_doc_4').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "surat-minitmesyuarat",
        _nomohon: "{{ $id }}"
    },
    acceptedFiles: 'application/pdf',
    maxFilesize: 2,
    maxFiles: 1,
    createImageThumbnails: false,
    previewTemplate : '<div style="display:none"></div>',
    init: function()
    {
        this.on("processing", function(file) {
            $("#wk_doc_4").attr("disabled","disabled");
            $("#wk_doc_4_processing").html('Sila tunggu sebentar...');
        });
        this.on("success", function(file) {
            var ret = file.xhr.response;
            var txt = ret.split('|');
            if (txt[0] == "OK") {
                $("#wk_doc_4").removeAttr("disabled");
                $("#wk_doc_4_processing").html('Dokumen berjaya dimuatnaik.');

            } else {
                alert('Error: ' + txt[0]);
            }
        });
        this.on("complete", function() {
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
        this.removeAllFiles();
            }
        });
        this.on("error", function(file, errorMessage) {
            console.log(errorMessage);
        });
    }
});

var Upload_SebutHarga1 = $('#wk_doc_5').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "sebutharga-1",
        _nomohon: "{{ $id }}"
    },
    acceptedFiles: 'application/pdf',
    maxFilesize: 2,
    maxFiles: 1,
    createImageThumbnails: false,
    previewTemplate : '<div style="display:none"></div>',
    init: function()
    {
        this.on("processing", function(file) {
            $("#wk_doc_5").attr("disabled","disabled");
            $("#wk_doc_5_processing").html('Sila tunggu sebentar...');
        });
        this.on("success", function(file) {
            var ret = file.xhr.response;
            var txt = ret.split('|');
            if (txt[0] == "OK") {
                $("#wk_doc_5").removeAttr("disabled");
                $("#wk_doc_5_processing").html('Dokumen Sebutharga 1 berjaya dimuatnaik.');

            } else {
                alert('Error: ' + txt[0]);
            }
        });
        this.on("complete", function() {
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
        this.removeAllFiles();
            }
        });
        this.on("error", function(file, errorMessage) {
            console.log(errorMessage);
        });
    }
});

var Upload_SebutHarga2 = $('#wk_doc_6').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "sebutharga-2",
        _nomohon: "{{ $id }}"
    },
    acceptedFiles: 'application/pdf',
    maxFilesize: 2,
    maxFiles: 1,
    createImageThumbnails: false,
    previewTemplate : '<div style="display:none"></div>',
    init: function()
    {
        this.on("processing", function(file) {
            $("#wk_doc_6").attr("disabled","disabled");
            $("#wk_doc_6_processing").html('Sila tunggu sebentar...');
        });
        this.on("success", function(file) {
            var ret = file.xhr.response;
            var txt = ret.split('|');
            if (txt[0] == "OK") {
                $("#wk_doc_6").removeAttr("disabled");
                $("#wk_doc_6_processing").html('Dokumen Sebut Harga 2 berjaya dimuatnaik.');

            } else {
                alert('Error: ' + txt[0]);
            }
        });
        this.on("complete", function() {
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
        this.removeAllFiles();
            }
        });
        this.on("error", function(file, errorMessage) {
            console.log(errorMessage);
        });
    }
});

var Upload_SebutHarga3 = $('#wk_doc_7').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "sebutharga-3",
        _nomohon: "{{ $id }}"
    },
    acceptedFiles: 'application/pdf',
    maxFilesize: 2,
    maxFiles: 1,
    createImageThumbnails: false,
    previewTemplate : '<div style="display:none"></div>',
    init: function()
    {
        this.on("processing", function(file) {
            $("#wk_doc_7").attr("disabled","disabled");
            $("#wk_doc_7_processing").html('Sila tunggu sebentar...');
        });
        this.on("success", function(file) {
            var ret = file.xhr.response;
            var txt = ret.split('|');
            if (txt[0] == "OK") {
                $("#wk_doc_7").removeAttr("disabled");
                $("#wk_doc_7_processing").html('Dokumen Sebutharga 3 berjaya dimuatnaik.');

            } else {
                alert('Error: ' + txt[0]);
            }
        });
        this.on("complete", function() {
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
        this.removeAllFiles();
            }
        });
        this.on("error", function(file, errorMessage) {
            console.log(errorMessage);
        });
    }
});

@endsection

@section('content')

<div class="section__content section__content--p30">
    <div class="container-fluid">   
		<div class="row">
            <div class="col-lg-12">						
				<div class="card mb-3">	
					<div class="card-header">
						<i class="fa fa-users"></i> <b>  C.  MuatNaik Dokumen Sokongan</b>
					</div>	
					<div class="card-body"> 
						<div class="form-row">   
							<div class="form-group col-md-6">                        
								<label for="example1">1. Surat Iringan Permohonan JPICT :</label><br>
								<div id="wk_doc_1_processing"></div>
							 	<button id="wk_doc_1" class="btn btn-primary" type="button">Muatnaik</button><br>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">                            
								<label for="example1">2. Lampiran Kedudukan Kewangan Sekolah :</label><br>
								<div id="wk_doc_2_processing"></div>
							 	<button id="wk_doc_2" class="btn btn-primary" type="button">Muatnaik</button><br>
							</div>
						</div>
						@if($kew == 1)
						<div class="form-row">
							<div class="form-group col-md-6">                            
								<label for="example1">3. Surat Kelulusan Penggunaan Peruntukan :</label><br>
								<div id="wk_doc_3_processing"></div>
							 	<button id="wk_doc_3" class="btn btn-primary" type="button">Muatnaik</button><br>
							</div>
						</div>
						@endif
						<div class="form-row">
							<div class="form-group col-md-6">    
							@if($kew == 1)                        
								<label for="example1">4. Minit Mesyuarat Persetujuan Penggunaan Peruntukan :</label>
							@else <label for="example1">3. Minit Mesyuarat Persetujuan Penggunaan Peruntukan :</label>
							@endif<br>
								<div id="wk_doc_4_processing"></div>
							 	<button id="wk_doc_4" class="btn btn-primary" type="button">Muatnaik</button><br>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">  
							@if($kew == 1)                          
								<label for="example1">5. Tiga (3) Sebutharga daripada Syarikat :</label>
							@else <label for="example1">4. Tiga (3) Sebutharga daripada Syarikat :</label>
							@endif <br>
								<div id="wk_doc_5_processing"></div>
								<div id="wk_doc_6_processing"></div>
								<div id="wk_doc_7_processing"></div>
							 	<button id="wk_doc_5" class="btn btn-primary" type="button">Muatnaik Sebut Harga 1</button>
							 	<button id="wk_doc_6" class="btn btn-primary" type="button">Muatnaik Sebut Harga 2</button>
							 	<button id="wk_doc_7" class="btn btn-primary" type="button">Muatnaik Sebut Harga 3</button><br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection	