<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permohonan;

class SuperadminController extends Controller
{
    public function SenaraiPermohonan(Request $request)
    {
    	$status = 0;
    	return view('superadmin.senaraipermohonan',[
    												'senarai' => Permohonan::all(),
    												'status' => $status
    												]);
    }
}
