@extends('master.app')

@section('js')

<script type="text/javascript">


 function ValidateBorang() 
 {
    if($('#alamat').val().length == 0)
    {
        Swal({
                type: 'error',
                title: 'Tidak Lengkap!',
                text: 'Sila Lengkapkan Alamat Sekolah!',
        });
        $('#alamat').focus();
        return false;
    }

    if($('#notelfn').val().length == 0)
    {
        Swal({
                type: 'error',
                title: 'Tidak Lengkap!',
                text: 'Sila Lengkapkan No. Telefon Sekolah!',
        });
        $('#notelfn').focus();
        return false;
    }

    if($('#nofaks').val().length == 0)
    {
        Swal({
                type: 'error',
                title: 'Tidak Lengkap!',
                text: 'Sila Lengkapkan No. Faks Sekolah!',
        });
        $('#nofaks').focus();
        return false;
    }
    return true;
}
</script>
@endsection

@section('jquery')


var avatar = $('#btn-avatar').dropzone({
    url: '{{ url('/avtr/upload') }}',
    params: {
        _token: "{{ csrf_token() }}"
    },
    acceptedFiles: 'image/jpg, image/jpeg, image/png',
    maxFilesize: 2,
    maxFiles: 1,
    createImageThumbnails: false,
    previewTemplate : '<div style="display:none"></div>',
    init: function()
    {
        this.on("processing", function(file) {
            $("#btn-avatar").html('Sedang Dimuatnaik <i class="fa fa-cog fa-spin"></i>');
            $("#btn-avatar").attr("disabled","disabled");
            $("#output").html('Sila tunggu sebentar...');
        });
        this.on("success", function(file) {
            var ret = file.xhr.response;
            var txt = ret.split('|');
            if (txt[0] == "OK") {
                $("#btn-avatar").removeAttr("disabled");
                var randomId = new Date().getTime();
                $("#btn-avatar").html('Upload Avatar');
                $("#output").html('');
                $(".img-avatar").attr("src","/avtr/?cache="+randomId);
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

$('#btn-delete-avatar').click(function(){
    $.ajax({
        url: '{{ url('/avtr/delete') }}',
        data: {
            _token: "{{ csrf_token() }}"
        }
    }).done(function() {
        var randomId = new Date().getTime();
        $(".img-avatar").attr("src","/avtr/?cache="+randomId);
    });
});


@endsection

@section('content')

<h4><i class="fa fa-edit"></i>&nbsp;&nbsp;Kemaskini Maklumat Profil Sekolah</h4>
<hr/><br/><br/>
<div class="row">
<div class="col-lg-12"> 
<div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
            <div class="au-card-title" style="background-image:url('/bootstrap/images/bg-title-02.jpg');">
                <div class="bg-overlay bg-overlay--blue"></div>
                <h3>
                    <i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;Maklumat Profil</h3>
            </div>                     
        <div class="card-body">
            <div class="row text-right">
                <div class="col-md-12 offset-md-12 col-sm-12">
                    <div class="text-right">
                        @if (Auth::User()->avatar != "default.jpg" || Auth::User()->avatar != "")
                            <img class="img-avatar" title="{{ Auth::User()->name }}" src="/avtr" width="100"><br><br>
                        @else
                            <img class="img-avatar" title="{{ Auth::User()->name }}" src="{{ asset('avatar/default.jpg') }}" width="100"><br><br>
                        @endif
                        <div id="output"></div>
                        <button id="btn-avatar" class="btn btn-sm btn-success" type="button">Upload Avatar</button>
                        <button type="button" id="btn-delete-avatar" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            <form data-toggle="validator" role="form" method="post" action="/sekolah/kemaskini-profil/{{ Auth::User()->kodsekolah }}" onsubmit="return ValidateBorang();">
            <div class="form-row">   
                <div class="form-group col-md-6">                            
                    <label for="example1">Nama Sekolah</label>
                    <input class="form-control" type="text" name="namasekolah" id="namaskeolah" value="{{ $maklumat->name }}" disabled>
                    <input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>  
                <div class="form-group col-md-4">
                    <label for="NoTel">Alamat Emel Rasmi (MyGovUc)</label>
                    <input class="form-control" type="text" name="emel" id="emel" value="{{ $maklumat->email }}" disabled>
                </div>
            </div>
            <div class="form-row">  
                <div class="form-group col-md-12">
                    <label for="NoMykad">Alamat Sekolah </label>
                    <input class="form-control" type="text" name="alamat" id="alamat" value="{{ $maklumat->alamat }}" >
                </div>
            </div>
            <div class="form-row"> 
                <div class="form-group col-md-6">
                    <label for="Poskod">Poskod </label>
                    <input class="form-control" type="text" name="poskod" id="poskod" value="{{ $maklumat->poskod }}" >
                </div> 
                <div class="form-group col-md-6">
                    <label for="Poskod">Daerah </label>
                    <input class="form-control" type="text" name="daerah" id="daerah" value="{{ $maklumat->fk_kodppd }}" >
                </div>
            </div>
            <div class="form-row">  
                <div class="form-group col-md-6">
                    <label for="NoTel">No. Telefon</label>
                    <input class="form-control" type="text" name="notelfn" id="notelfn" value="{{ $maklumat->notelsekolah }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="NoTel">No. Faks</label>
                    <input class="form-control" type="text" name="nofaks" id="nofaks" value="{{ $maklumat->nofaksekolah }}">
                </div>
            </div>
         </div>
    </div> 
</div>

<div class="container-fluid">
        <input class="btn btn-primary" type="submit" name="submit" value="Kemaskini">
    </div>
</div>
</form>


    @endsection