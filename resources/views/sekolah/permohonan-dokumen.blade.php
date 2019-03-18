@extends('master.app')

@section('css')
<link href="{{ asset('bootstrap/vendor/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection

@section('js')

<script src="{{ asset('bootstrap/vendor/dropzone/dropzone.min.js') }}"></script>

@endsection

@section('jquery')

var Upload_BorangPermohonan = $('#wk_doc_1').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "borang-permohonan",
        _nomohon: "{{ $idmohon }}"
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
            $("#wk_doc_1_processing").html('Dokumen tidak berjaya dimuatnaik.', errorMessage);
        });
    }
});
var Upload_SuratIringanMohon = $('#wk_doc_2').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "surat-iringan",
        _nomohon: "{{ $idmohon }}"
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

var Upload_KedudukanKewangan = $('#wk_doc_3').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "surat-kedudukankewangan",
        _nomohon: "{{ $idmohon }}"
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

var Upload_BorangPPKP = $('#wk_doc_4').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "borang-ppkp",
        _nomohon: "{{ $idmohon }}"
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

var Upload_KelulusanPeruntukan = $('#wk_doc_5').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "surat-kelulusangunaperuntukan",
        _nomohon: "{{ $idmohon }}"
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
                $("#wk_doc_5_processing").html('Dokumen berjaya dimuatnaik.');

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

var Upload_PenyataKewangan = $('#wk_doc_6').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "penyata-kewangan",
        _nomohon: "{{ $idmohon }}"
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
                $("#wk_doc_6_processing").html('Dokumen berjaya dimuatnaik.');

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

var Upload_MinitMesyuarat = $('#wk_doc_7').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "surat-minitmesyuarat",
        _nomohon: "{{ $idmohon }}"
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
                $("#wk_doc_7_processing").html('Dokumen berjaya dimuatnaik.');

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

var Upload_SebutHarga1 = $('#wk_doc_8').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "sebutharga-1",
        _nomohon: "{{ $idmohon }}"
    },
    acceptedFiles: 'application/pdf',
    maxFilesize: 2,
    maxFiles: 1,
    createImageThumbnails: false,
    previewTemplate : '<div style="display:none"></div>',
    init: function()
    {
        this.on("processing", function(file) {
            $("#wk_doc_8").attr("disabled","disabled");
            $("#wk_doc_8_processing").html('Sila tunggu sebentar...');
        });
        this.on("success", function(file) {
            var ret = file.xhr.response;
            var txt = ret.split('|');
            if (txt[0] == "OK") {
                $("#wk_doc_8").removeAttr("disabled");
                $("#wk_doc_8_processing").html('Dokumen Sebutharga 1 berjaya dimuatnaik.');

            } else {
                alert('Ada Error: ' + txt[0]);
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

var Upload_SebutHarga2 = $('#wk_doc_9').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "sebutharga-2",
        _nomohon: "{{ $idmohon }}"
    },
    acceptedFiles: 'application/pdf',
    maxFilesize: 2,
    maxFiles: 1,
    createImageThumbnails: false,
    previewTemplate : '<div style="display:none"></div>',
    init: function()
    {
        this.on("processing", function(file) {
            $("#wk_doc_9").attr("disabled","disabled");
            $("#wk_doc_9_processing").html('Sila tunggu sebentar...');
        });
        this.on("success", function(file) {
            var ret = file.xhr.response;
            var txt = ret.split('|');
            if (txt[0] == "OK") {
                $("#wk_doc_9").removeAttr("disabled");
                $("#wk_doc_9_processing").html('Dokumen Sebut Harga 2 berjaya dimuatnaik.');

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

var Upload_SebutHarga3 = $('#wk_doc_10').dropzone({
    url: '{{ url('/sekolah/upload') }}',
    params: {
        _token: "{{ csrf_token() }}",
        _jenis: "sebutharga-3",
        _nomohon: "{{ $idmohon }}"
    },
    acceptedFiles: 'application/pdf',
    maxFilesize: 2,
    maxFiles: 1,
    createImageThumbnails: false,
    previewTemplate : '<div style="display:none"></div>',
    init: function()
    {
        this.on("processing", function(file) {
            $("#wk_doc_10").attr("disabled","disabled");
            $("#wk_doc_10_processing").html('Sila tunggu sebentar...');
        });
        this.on("success", function(file) {
            var ret = file.xhr.response;
            var txt = ret.split('|');
            if (txt[0] == "OK") {
                $("#wk_doc_10").removeAttr("disabled");
                $("#wk_doc_10_processing").html('Dokumen Sebutharga 3 berjaya dimuatnaik.');

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

<h4> Senarai Dokumen yang telah dimuatnaik : </h4><br>

        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th class="text-left">#</th>
                        <th class="text-left">Dokumen</th>
                    </tr>
                </thead>
                <tbody>
                @if (count($dokumen) == 0)
                    <tr>
                        <td colspan="6" class="text-center"><i>Tiada maklumat dokumen yang telah dimuatnaik</i></td>
                    </tr>
                @else
                    @foreach($dokumen as $index => $doc)
                        <tr>
                            <td class="text-left">{{ $index +1 }}.</td>
                            <td class="text-left"><a href="/upload/{{ $doc->nama_fail }}" target="_blank" top="0" left="0" width="550" height="600">{{ $doc->nama_fail }}</a></td>
                        </tr>                    
                    @endforeach
                @endif

            </table>
        </div>
  
<div class="row">
    <div class="col-lg-12">						
		<div class="card mb-3">	
			<div class="card-header">
				<i class="fa fa-envelope"></i>  E. &nbsp;&nbsp;&nbsp;Muatnaik Dokumen
			</div>	
			<div class="card-body">
                <div class="form-row">   
                    <div class="form-group col-md-12">                        
                        <label for="example1">1. Borang Permohonan JPICT (Lampiran 9):</label><br>
                        <div id="wk_doc_1_processing"></div>
                        <button id="wk_doc_1" class="btn btn-primary" type="button">Muatnaik</button><br>
                    </div>
                </div> 
				<div class="form-row">   
					<div class="form-group col-md-12">                        
						<label for="example1">2. Surat Iringan Permohonan JPICT :</label><br>
						<div id="wk_doc_2_processing"></div>
					 	<button id="wk_doc_2" class="btn btn-primary" type="button">Muatnaik</button><br>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">                            
						<label for="example1">3. Lampiran Kedudukan Kewangan Sekolah (Lampiran 8) :</label><br>
						<div id="wk_doc_3_processing"></div>
					 	<button id="wk_doc_3" class="btn btn-primary" type="button">Muatnaik</button><br>
					</div>
				</div>
                @if($kew == 2)
                <div class="form-row">
                    <div class="form-group col-md-12">                            
                        <label for="example1">4. Borang PPKP (Lampiran 10) :</label><br>
                        <div id="wk_doc_4_processing"></div>
                        <button id="wk_doc_4" class="btn btn-primary" type="button">Muatnaik</button><br>
                    </div>
                </div>
				
				<div class="form-row">
					<div class="form-group col-md-12">                            
						<label for="example1">5. Surat Kelulusan Penggunaan Peruntukan :</label><br>
						<div id="wk_doc_5_processing"></div>
					 	<button id="wk_doc_5" class="btn btn-primary" type="button">Muatnaik</button><br>
					</div>
				</div>
				@endif
                <div class="row">
                    <div class="form-group col-md-12">
                @if($kew == 2)
                        <label for="PenyataKewangan">6. Penyata Kewangan Peruntukan digunakan :</label>
                @else
                        <label for="PenyataKewangan">4. Penyata Kewangan Peruntukan digunakan :</label>
                @endif
                        <div id="wk_doc_6_processing"></div>
                        <button id="wk_doc_6" class="btn btn-primary" type="button">Muatnaik</button><br>
                    </div>
                </div>
				<div class="form-row">
					<div class="form-group col-md-12">    
					@if($kew == 2)                        
						<label for="example1">7. Minit Mesyuarat Persetujuan Penggunaan Peruntukan :</label>
					@else <label for="example1">5. Minit Mesyuarat Persetujuan Penggunaan Peruntukan :</label>
					@endif<br>
						<div id="wk_doc_6_processing"></div>
					 	<button id="wk_doc_7" class="btn btn-primary" type="button">Muatnaik</button><br>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">  
					@if($kew == 2)                          
						<label for="example1">8. Tiga (3) Sebutharga daripada Syarikat :</label>
					@else <label for="example1">6. Tiga (3) Sebutharga daripada Syarikat :</label>
					@endif <br>
						<div id="wk_doc_8_processing"></div>
						<div id="wk_doc_9_processing"></div>
						<div id="wk_doc_10_processing"></div>
					 	<button id="wk_doc_8" class="btn btn-primary" type="button">Muatnaik Sebut Harga 1</button>
					 	<button id="wk_doc_9" class="btn btn-primary" type="button">Muatnaik Sebut Harga 2</button>
					 	<button id="wk_doc_10" class="btn btn-primary" type="button">Muatnaik Sebut Harga 3</button><br>
					</div>
				</div>
			</div>
		</div>
	</div>
        <a href="/sekolah/permohonan/{{ Auth::User()->kodsekolah }}"><input class="btn btn-success" type="submit" name="submit" value="Simpan" nofocus></a>
</div>
@endsection	