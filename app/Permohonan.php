<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = 'permohonan';

    public function SumberPeruntukan() 
    {
    	return $this->hasOne('App\PeruntukanKewangan', 'id_peruntukan', 'moh_sumberp');
    }

    public function DokumenPermohonan()
    {
    	return $this->hasMany('App\UploadDokumen','id_permohonan','moh_numbers');
    }

    public function peralatan()
    {
    	return $this->hasMany('App\Peralatan', 'moh_numbers', 'pra_idmohon');
    }
}

