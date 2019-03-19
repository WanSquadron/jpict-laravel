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
                            <li class="list-inline-item">Permohonan Baru
                            </li>
                            <li class="list-inline-item seprate">
                                <span>/</span>
                            </li>
                            <li class="list-inline-item">Maklumat Peralatan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('content')

<script type="text/javascript">

function ValidateBorang() 
 {
    if($('#pralatn').val().length == 0)
    {
        Swal({
                type: 'error',
                title: 'Tidak Lengkap!',
                text: 'Sila Pilih Perkakasan/Perisian!',
        });
        $('#pralatan').focus();
        return false;
    }

    if($('#catatan').val().length == 0)
    {
        Swal({
                type: 'error',
                title: 'Tidak Lengkap!',
                text: 'Sila Lengkapkan Kuantiti!',
        });
        $('#catatan').focus();
        return false;
    }

    if($('#kuantti').val().length == 0)
    {
        Swal({
                type: 'error',
                title: 'Tidak Lengkap!',
                text: 'Sila Lengkapkan Kuantiti!',
        });
        $('#kuantti').focus();
        return false;
    }

    if($('#hrgalat').val().length == 0)
    {
        Swal({
                type: 'error',
                title: 'Tidak Lengkap!',
                text: 'Sila Lengkapkan Harga Peralatan/Perisian!',
        });
        $('#hrgalat').focus();
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


function DeleteData(id) {
  if (id.length == 0) { return false; }
    
    swal({
        title: "Padam Rekod ?",
        html: "Anda pasti untuk padam rekod ini ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
        preConfirm: function() {
            return new Promise(function(resolve, reject) {
                $.ajax({
                    method: "GET",
                    url: "/sekolah/peralatan/padam/"+id,
                    success: function(data) {
                        resolve();
                        eval(data);
                    },
                    error: function(xhr, status, err) {
                        reject();
                        console.log("AjxErr: ("+status+") "+err);
                    },
                    fail: function(xhr, status) {
                        reject();
                        console.log("AjxErr: "+status);
                    }
                });
            });
        }
    });
}

</script>


       <h4> Senarai Peralatan Ingin Dibeli : </h4><br>

        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th class="text-left">#</th>
                        <th class="text-left">Peralatan/Perisian</th>
                        <th class="text-left">Harga Seunit</th>
                        <th class="text-center">Kuantiti (Unit)</th>
                        <th class="text-left">Jumlah</th>
                        <th class="text-left">Konfigurasi</th>
                    </tr>
                </thead>
                <tbody>
                @if (count($peralatan) == 0)
                    <tr>
                        <td colspan="6" class="text-center"><i>Tiada Maklumat Peralatan/Perisian</i></td>
                    </tr>
                @else
                    @foreach($peralatan as $index => $alatan)
                        <tr id="alatan_{{ $alatan->id }}">
                            <td class="text-left">{{ $index +1 }}.</td>
                            <td class="text-left">{{ $alatan->alat->nama_peralatan }} - {{ $alatan->catatan }}</td>
                            <td class="text-left">RM {{ $alatan->hargaseunit }}</td>
                            <td class="text-center">{{ $alatan->kuantiti }}</td>
                            <td class="text-left">RM{{ number_format($jumlah = $alatan->kuantiti * $alatan->hargaseunit, 2, "." , ",") }}</td>
                            <td class="text-left"><button class="btn btn-danger" onclick="javascript:DeleteData('{{ $alatan->id }}'); return false;"><i class="fa fa-times"></i>&nbsp;Padam</button></td>
                        </tr>                    
                    @endforeach
                        <tr>
                            <td colspan="4" class="text-right"><h4>Jumlah Keseluruhan</h4></td>
                            <td class="text-left"><h4>RM {{ number_format($jumlaharga, 2, ".",",") }}</h4></td>
                            <td></td>
                        </tr>
                @endif

            </table>
        </div>

        <form data-toggle="validator" role="form" method="post" action="/sekolah/simpan-peralatan/{{ $idmohon }}" onsubmit="javascript:return ValidateBorang();">
        <div class="row">
            <div class="col-lg-12">                     
                <div class="card mb-3"> 
                    <div class="card-header">
                        <i class="fa fa-cogs"></i>  D. &nbsp;&nbsp;&nbsp;Maklumat Peralatan & Perisian
                    </div>  
                    <div class="card-body"> 
                        <div class="form-row">   
                            <div class="form-group col-md-4">                            
                                <label for="example1">Perkakasan & Perisian</label>
                                <select class="form-control" name="pralatn" id="pralatn" placeholder="Sila pilih Peralatan/Perisian">
                                    <option value="">Sila Pilih Peralatan/Perisian</option>
                                    @foreach ($perkakasan as $alatan)
                                        <option value="{{ $alatan->idperalatan }}">{{ $alatan->nama_peralatan }}</option>
                                    @endforeach     
                                </select>
                                <input type="hidden" name="idmohon" id="idmohon" value="{{ $idmohon }}">
                                <input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div> 
                        </div> 

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="NoMykad">Jenama & Model </label>
                                <input class="form-control" type="text" name="catatan" id="catatan" placeholder="Sila Masukkan Catatan Tambahan (jika ada)" >
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="NoMykad">Kuantiti </label>
                                <input class="form-control" type="text" name="kuantti" id="kuantti" placeholder="Sila Masukkan Kuantiti Pembelian" >
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="HargaSeunit">Harga Seunit (RM)</label>
                                <input class="form-control" type="text" name="hrgalat" id="hrgalat" placeholder="Sila Masukkan Harga Seunit. cth : 150.00">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="Status Pembelian">Status Pembelian</label>
                                <select class="form-control" name="statbli" id="statbli">
                                    <option value="">Sila pilih Status Pembelian</option>
                                    <option value="1">Telah Dibeli</option>
                                    <option value="2">Belum Dibeli</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div vlass="col-lg-12">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                           <input class="btn btn-primary" type="submit" name="submit" value="Simpan" nofocus>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <a href="/sekolah/permohonan/dokumen/{{ $idmohon }}"><input class="btn btn-primary" type="submit" name="seterusnya" value="Seterusnya" nofocus></a>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

@endsection