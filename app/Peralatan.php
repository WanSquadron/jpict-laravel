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
  
}
