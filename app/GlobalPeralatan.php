<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalPeralatan extends Model
{
    protected $table = 'glo_pralatn';

    public function peralatan()
    {
    	return $this->hasMany('App\Peralatan', 'kod_hware', 'pra_idalatn');
    }

}
