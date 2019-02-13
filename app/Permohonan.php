<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = 'permohonan';

    public function StatusBeli() 
    {
    	return $this->hasOne('App\StatusBeli', 'idbeli', 'moh_statusm');
    }

    public function DokumenPermohonan()
    {
    	return $this->hasOne('App\UploadDokumen','id_permohonan','moh_numbers');
    }
}

