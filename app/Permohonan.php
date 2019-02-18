<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = 'permohonan';

    public function SumberPeruntukan() 
    {
    	return $this->hasOne('App\GlobalPeruntukanKewangan', 'idsumberkewangan', 'fk_idsumberkewangan');
    }

    public function DokumenPermohonan()
    {
    	return $this->hasMany('App\UploadDokumen','id_permohonan','fk_idpermohonan');
    }

    public function peralatan()
    {
    	return $this->hasMany('App\Peralatan', 'fk_idpermohonan', 'idpermohonan');
    }
}

