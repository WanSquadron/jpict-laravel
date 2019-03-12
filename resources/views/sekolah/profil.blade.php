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

@section('content')

<h4><i class="fa fa-edit"></i>&nbsp;&nbsp;Kemaskini Maklumat Profil Sekolah</h4>
<hr/><br/><br/>

<form data-toggle="validator" role="form" method="post" action="/sekolah/kemaskini-profil/{{ Auth::User()->kodsekolah }}" onsubmit="return ValidateBorang();">
<div class="row">
<div class="col-lg-12"> 
<div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
            <div class="au-card-title" style="background-image:url('/bootstrap/images/bg-title-02.jpg');">
                <div class="bg-overlay bg-overlay--blue"></div>
                <h3>
                    <i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;Maklumat Profil</h3>
            </div>                     
        <div class="card-body"> 
            <div class="form-row">   
                <div class="form-group col-md-6">                            
                    <label for="example1">Nama Sekolah</label>
                    <input class="form-control" type="text" name="namasekolah" id="namaskeolah" value="{{ $maklumat->name }}" disabled>
                    <input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>  
                <div class="form-group col-md-4">
                    <label for="NoTel">Alamat Emel Rasmi (1GovUc)</label>
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