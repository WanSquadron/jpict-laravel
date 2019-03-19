@extends('master.app')

@section('content')

<h4>Maklumat Permohonan JPICT {{ ucwords(strtolower($mohon->getNamaSekolahAttribute() )) }}</h4><hr/>

<div class="section__content section__content--p30">
	<div class="row">
        <div class="col-lg-12">						
			<div class="card mb-3">	
				<div class="card-header">
					<i class="fa fa-users"></i>  A. &nbsp;&nbsp;&nbsp;Maklumat Pegawai Bertanggungjawab
				</div>	
				<div class="card-body"> 
					<div class="form-row">   
						<div class="form-group col-md-4">
							Nama Pegawai Bertanggungjawab
						</div>
						<div class="form-group col-md-1">
							:
						</div>
						<div class="form-group col-md-7">
							{{ $mohon->pegawaitanggungjawab }}
						</div>	
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							No. Mykad
						</div>
						<div class="form-group col-md-1">
							:
						</div>
						<div class="form-group col-md-7">
							{{ $mohon->mykadpegawai }}
						</div>
					</div>
						<div class="form-row">
						<div class="form-group col-md-4">
							No. Telefon
						</div>
						<div class="form-group col-md-1">
							:
						</div>
						<div class="form-group col-md-7">
							{{ $mohon->notelpegawai }}
						</div>
					</div>
				</div>
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
						<div class="form-group col-md-4">
							<label for="NoSurat">Sumber Peruntukan</label>
						</div>
						<div class="form-group col-md-1"> 
							:
						</div> 
						<div class="form-group col-md-7">
						 	{{ $mohon->NamaSumberKewangan }}
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Keterangan Sumber Peruntukan</label>
						</div>
						<div class="form-group col-md-1">
							:
						</div>
						<div class="form-group col-md-7">
							{{ $mohon->keterangan }}
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Tujuan Pembelian</label>
						</div>
						<div class="form-group col-md-1">
							:
						</div>
						<div class="form-group col-md-7">
							@if($mohon->tujuanbeli == "PdT") PdT - Pengurusan dan Pentadbiran @else PdPc - Pengajaran dan Pemudahcaraan
							@endif
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Justifikasi Pembelian (Sebab Perlu Dibeli)</label>
						</div>
						<div class="form-group col-md-1">
							:
						</div>
						<div class="form-group col-md-7">
							{{ $mohon->justifikasi }}
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Jumlah Peruntukan Tahun Semasa</label>
						</div>
						<div class="form-group col-md-1">
							:
						</div>
						<div class="form-group col-md-7">
							RM{{ $mohon->jumlahwang }}
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Baki Peruntukan Tahun Semasa</label>
						</div>
						<div class="form-group col-md-1">
							:
						</div>
						<div class="form-group col-md-7">
							RM{{ $mohon->bakiwang }}
						</div>
					</div>
				</div>								
			</div>
		</div>
	</div>
		
	<div class="row">
		<div class="col-md-12">						
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-cogs"></i>   C.&nbsp;&nbsp;&nbsp;Peralatan/Perisian Dibeli
				</div>						
				<div class="card-body">
			        <div class="table-responsive table--no-card m-b-30">
			            <table class="table table-borderless table-striped table-earning">
			                <thead>
			                    <tr>
			                        <th class="text-left">#</th>
			                        <th class="text-left">Peralatan/Perisian</th>
			                        <th class="text-left">Harga Seunit</th>
			                        <th class="text-center">Kuantiti (Unit)</th>
			                        <th class="text-left">Jumlah</th>
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
			                        </tr>                    
			                    @endforeach
			                        <tr>
			                            <td colspan="4" class="text-right"><h4>Jumlah Keseluruhan</h4></td>
			                            <td class="text-left"><h4>RM {{ number_format($jumlaharga, 2, ".",",") }}</h4></td>
			                        </tr>
			                @endif
			            	</tbody>
			            </table>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection