<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RujukanSurat extends Model
{
    protected $table = "rujukan_surat";
}

function senaraisurat()
{
	return $this->belongsTo('App\Permohonan', 'fk_idpermohonan', 'idpermohonan');
}