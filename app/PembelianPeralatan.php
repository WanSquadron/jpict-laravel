<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembelianPeralatan extends Model
{
    protected $table = 'pembelian_peralatan';


    public function permohonan()
    {
    	return $this->belongsTo('App\Permohonan', 'fk_idpermohonan', 'idpermohonan');
    }

    public function alat()
    {
    	return $this->belongsTo('App\GlobalSenaraiPeralatan', 'fk_idperalatan', 'idperalatan');
    }

    public function getStatusBeliAttribute()
    {
    	$status_beli = GlobalStatusBeli::where('idstatusbeli', $this->fk_idstatusbeli)->first();
      	return $status_beli->nama_statusbeli;
    }
  
}
