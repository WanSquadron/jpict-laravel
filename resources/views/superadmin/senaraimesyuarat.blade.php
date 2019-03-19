@extends('master.app')

@section('content')

<h4>Senarai Mesyuarat JPICT Negeri Perak bagi Tahun {{ date('Y') }} </h4><hr/><br/><br/>

<div class="table-data__tool-right">
    <a href="/superadmin/mesyuarat/?cmd=tambah">
        <button class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>tambah</button></a>
</div><br/>

<div class="table-responsive m-b-40">
	    <table class="table table-borderless table-data3" id="mohon">
	        <thead>
	            <tr>
	            	<th class="text-left">#</th>
	                <th class="text-left">Perkara</th>
	                <th class="text-left">Tarikh/Hari</th>
	                <th class="text-left">Masa</th>
	                <th class="text-left">Tempat</th>
	                <th class="text-center">Aktif</th>
	            </tr>
	        </thead>
	        <tbody>
	        	@foreach($mesyuarat as $index => $meeting)
	        		<tr>
	        			<td>{{ $index +1 }}.</td>
	        			<td>{{ $meeting->perkara }}</td>
	        			<td>{{ $meeting->TarikhMesyuarat }} ({{$meeting->hari }})</td>
	        			<td>{{ $meeting->MasaMesyuarat }}</td>
	        			<td>{{ $meeting->tempat }}</td>
	        			<td class="text-center">@if($meeting->active == "YES") <img src="{{ asset('bootstrap/images/icon/check.png')}}" /> @endif</td>
	        		</tr>
	        	@endforeach
	        </tbody>
	    </table>
</div>
@endsection
