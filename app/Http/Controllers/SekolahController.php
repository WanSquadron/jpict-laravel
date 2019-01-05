<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function PeruntukanKewangan ()
    {
    	$peruntukan = PeruntukanKewangan::all();

    	return view('/permohonan-baru',[
    		'id' => $idperuntukan,
    		'desc' => $deskripsi

    	]);
    }
}
