@extends('master.app')

@section('js')
<script type="text/javascript">

function confirmation(id) 
 {
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
                    _token: "{{ csrf_token() }}",
                    url: "/sekolah/permohonan/padam/"+id,
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
@endsection

@section('content')

<h4>Senarai Permohonan</h4><hr/><br/><br/>
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3" id="mohon">
        <thead>
            <tr>
            	<th class="text-left">#</th>
                <th class="text-left">Maklumat Pemohon</th>
                <th class="text-left">Sumber Peruntukan</th>
                <th class="text-left">Tarikh Permohonan</th>
                <th class="text-right">Tindakan</th>
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
                 	<td class="text-left">{{ $index +1 }}.</td>
                    <td class="text-left"><b><a href="/superadmin/permohonan/{{ $list->idpermohonan }}">ID Permohonan : {{ $list->idpermohonan }}</a></b><br/> {{ ucwords(strtolower($list->NamaSekolah)) }}</td>
                    <td>{{ $list->sumberperuntukan->nama_sumberkewangan }} - {{ $list->keterangan }}<br/><br/>
                        <b>Dokumen Sokongan :-</b> <br/>

                             @foreach(App\UploadDokumen::where('fk_idpermohonan',$list->idpermohonan)->get() as $index => $doc)
                             {{ $index +1 }}. &nbsp; 

                                @if(!empty($doc->nama_fail)) 
                                    <a href="/upload/{{ $doc->nama_fail }}" target="_blank" top="0" left="0" width="550" height="600">{{ $doc->fail_deskripsi }}</a>
                                    <img src="{{ asset('bootstrap/images/icon/check.png')}}"/><br/>
                                    @else
                                    {{ $doc->fail_deskripsi }}</a>
                                        <img src="{{ asset('bootstrap/images/icon/close.png')}}"/><br/>
                                @endif
                                
                                    
                            @endforeach

                            <?php $dokumen = App\UploadDokumen::where([
                                                                        ['fk_idpermohonan', $list->idpermohonan],
                                                                        ['nama_fail', '!=', '']])->count(); ?>
                            @if(($list->fk_idsumberkewangan = '2' ) && ($dokumen >= 7))
                                    Status : Dokumen Lengkap SUWA {{ $dokumen }}
                            @elseif(($list->fk_idsumberkewangan != '2' ) && ($dokumen >= "6"))
                             Status : Dokumen Lengkap {{ $dokumen }}
                            @else Status : Dokumen Tidak Lengkap {{ $dokumen }}
                            @endif
                             

                        
                    </td>
                    <td>{{ $list->TarikhPermohonan }}</td>
                    <td class="text-left">
                        <div class="table-data-feature text-left">
                            <a href="#"><button class="item" data-toggle="tooltip" data-placement="top" title="Kemaskini">
                                <i class="fa fa-desktop"></i>
                            </button></a>&nbsp;&nbsp;
                            <button class="item" data-toggle="tooltip" data-placement="top" onclick="javascript:confirmation('{{ $list->id }}'); return false;" title="Padam">
                                <i class="zmdi zmdi-delete"></i>
                            </button></a>
                        </div>
                    </td>
                 </tr>
                 @endforeach
            @endif
    	</tbody>
    </table>
</div>
@endsection