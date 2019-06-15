<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Carbon\Carbon;

class Permohonan extends Model
{
    protected $table = 'permohonan';

    public function Permohonan()
    {
        return $this->belongsTo('App\User', 'kodsekolah', 'fk_kodsekolah');
    }

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
    	return $this->hasMany('App\PembelianPeralatan', 'fk_idpermohonan', 'idpermohonan');
    }

    public function getTarikhPermohonanAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function getNamaSekolahAttribute()
    {
        $namasekolah = \App\User::where('kodsekolah', $this->fk_kodsekolah)->first();
        return $namasekolah->name;
    }

    public function getNamaKodSekolahAttribute()
    {
        $namakod = \App\User::where('kodsekolah', $this->fk_kodsekolah)->first();
        return $namakod->name."(".$this->fk_kodsekolah.")";
    }

    public function getNamaSumberKewanganAttribute()
    {
        $namasumber = \App\GlobalPeruntukanKewangan::where('idsumberkewangan', $this->fk_idsumberkewangan)->first();
        return $namasumber->nama_sumberkewangan;
    }

    public function getStatusSyorAttribute()
    {
        $statusyor = \App\GlobalSyor::where('idsyor', $this->fk_idsyor)->first();
        return $statusyor->syor_deskripsi;
    }
}

