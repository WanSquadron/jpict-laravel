<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peralatan extends Model
{
    protected $table = 'tbl_pralatn';


    public function permohonan()
    {
    	return $this->belongsTo('App\Permohonan', 'pra_idmohon', 'moh_numbers');
    }

    public function alat()
    {
    	return $this->belongsTo('App\GlobalPeralatan', 'pra_idalatn', 'kod_hware');
    }

    public function getStatusBeliAttribute()
    {
    	$status_beli = App\StatusBeli::where('idbeli', $this->pra_statbli);
    	return $status_beli->description;
    }
  
}
