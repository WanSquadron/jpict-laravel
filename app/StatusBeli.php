<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusBeli extends Model
{
	public function StatusBeli() 
	{
		return $this->hasOne('App\DaftarPermohonan', 'moh_statusm', 'idbeli');
	}
}
