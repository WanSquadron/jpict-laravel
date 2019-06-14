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

@section('jquery')

jQuery('#dokumen').removeAttr("display");

@endsection

@section('content')


    	<div class="table-data__tool-right">
    		<a href="/sekolah/permohonan-baru/{{ $kodsekolah }}">
            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
             	<i class="zmdi zmdi-plus"></i>tambah
           	</button></a>
        </div><br/>
    	<div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3" id="mohon">
                <thead>
                    <tr>
                    	<th class="text-left">#</th>
                        <th class="text-left">No. Permohonan</th>
                        <th class="text-left">Sumber Peruntukan</th>
                        <th class="text-left">Tarikh Permohonan</th>
                        <th class="text-center">Tindakan</th>

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
                            <td class="text-left">{{ $list->idpermohonan }}</td>
                            <td>{{ $list->sumberperuntukan->nama_sumberkewangan }} - {{ $list->keterangan }}<br/><br/>
                                <a href="#" onclick="javascript:$('#d{{ $index +1}}').toggle(); return false;" title="Klik untuk lihat senarai dokumen yang telah dimuatnaik">Dokumen Sokongan</a> <br/>
                                <div id="d{{ $index + 1 }}" style="display:none">
                                
                                     @foreach(App\UploadDokumen::where('fk_idpermohonan',$list->idpermohonan)->get() as $index => $doc)
                                     {{ $index +1 }}. &nbsp; {{ $doc->fail_deskripsi }} : 
                                        @if(!empty($doc->nama_fail)) 
                                            <img src="{{ asset('bootstrap/images/icon/check.png')}}"/><br/>
                                            <?php $status++;?>
                                            @else
                                                <img src="{{ asset('bootstrap/images/icon/close.png')}}"/><br/>
                                        @endif
                                    @endforeach
                               </div>
                            </td>
                            <td>{{ $list->TarikhPermohonan }}</td>
                            <td class="text-left">
                                <div class="table-data-feature text-left">
                                    @if($list->fk_idsyor == "4")
                                    <a href="/sekolah/permohonan/kemaskini/{{ $list->idpermohonan }}"><button class="item" data-toggle="tooltip" data-placement="top" title="Kemaskini">
                                        <i class="zmdi zmdi-edit red" aria-hidden="true"></i>
                                    </button></a>&nbsp;&nbsp; 
                                    <button class="item" data-toggle="tooltip" data-placement="top" onclick="javascript:confirmation('{{ $list->id }}'); return false;" title="Padam">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button></a>

                                    @else <p class="text-success">Sedang diproses</p> @endif
                                </div>
                            </td>
                         </tr>
                         @endforeach
                    @endif
            	</tbody>
            </table>
        </div>
@endsection