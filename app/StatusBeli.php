<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusBeli extends Model
{
	protected $table = 'statusbeli';

	  public function StatusBelian()
    {
    	return $this->hasMany('App\Peralatan', 'idbeli', 'pra_statbli');
    }
}
