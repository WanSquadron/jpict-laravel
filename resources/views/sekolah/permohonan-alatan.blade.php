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

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th class="text-left">Bil</th>
                        <th class="text-left">Peralatan/Perisian</th>
                        <th class="text-center">Harga Anggaran (RM)</th>
                        <th class="text-center">Status Pembelian</th>
                        <th class="text-left">Konfigurasi</th>
                    </tr>
                </thead>
                <tbody>
                @if (count($peralatan) == 0)
                    <tr>
                        <td colspan="5" class="text-center"><i>Tiada Maklumat Peralatan/Perisian</i></td>
                    </tr>
                @else
                    @foreach($peralatan as $index => $alatan)
                        <tr>
                            <td class="text-left">{{ $index +1 }}.</td>
                            <td class="text-left">{{ $alatan->alat->perkara }}</td>
                            <td class="text-center">RM {{ $alatan->pra_hrgalat }}</td>
                            <td class="text-center">{{ $alatan->StatusBeli }}</td>
                            <td class="text-left">Edit | Padam</td>
                        </tr>                    
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

        <form data-toggle="validator" role="form" method="post" action="/sekolah/simpan-peralatan" onsubmit="return ValidateBorang();">
        <div class="row">
            <div class="col-lg-12">                     
                <div class="card mb-3"> 
                    <div class="card-header">
                        <i class="fa fa-users"></i>  C. &nbsp;&nbsp;&nbsp;Maklumat Peralatan & Perisian
                    </div>  
                    <div class="card-body"> 
                        <div class="form-row">   
                            <div class="form-group col-md-4">                            
                                <label for="example1">Perkakasan & Perisian</label>
                                <select class="form-control" name="pralatn" id="pralatn" placeholder="Sila pilih Peralatan/Perisian">
                                    <option value="">Sila Pilih Peralatan/Perisian</option>
                                    @foreach ($perkakasan as $alatan)
                                        <option value="{{ $alatan->kod_hware }}">{{ $alatan->perkara }}</option>
                                    @endforeach     
                                </select>
                                <input type="hidden" name="idmohon" id="idmohon" value="{{ $idmohon }}">
                                <input class="form-control" type="hidden" name="_token" value="{{ csrf_token() }}">
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

                        <div class="form-row"
                            <div class="form-group col-md-4">
                                <input class="btn btn-primary" type="submit" name="submit" value="Simpan" nofocus>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection