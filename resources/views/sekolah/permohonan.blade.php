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
    	<div class="table-data__tool-right">
    		<a href="/sekolah/permohonan-baru">
            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
             	<i class="zmdi zmdi-plus"></i>tambah
           	</button></a>
        </div><br/>
    	<div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                    	<th>Bil</th>
                        <th>No. Permohonan</th>
                        <th>Sumber Peruntukan</th>
                        <th>Tarikh Permohonan</th>
                        <th>Status Permohonan</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($senarai) == 0)
                    <tr>
                        <td colspan="6" class="text-center"><i>Tiada Maklumat Permohonan</i></td>
                    </tr>
                    @else
                	   @foreach($senarai as $index => $list)
                         <tr>
                         	<td>{{ $index++ }}.</td>
                             <td>{{ $list->moh_numbers }}</td>
                             <td>{{ $list->sumberperuntukan->per_deskrips }}</td>
                             <td>{{ $list->created_at }}</td>
                             <td>Tidak Lengkap</td>
                             <td><a href="/sekolah/permohonan-edit?id={{ $list->moh_numbers }}">Kemaskini</a>   |   Padam</td>
                         </tr>
                         @endforeach
                    @endif
            	</tbody>
            </table>
        </div>
    </div>
</div>

@endsection