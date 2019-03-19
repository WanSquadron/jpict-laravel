<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalMesyuarat extends Model
{
    protected $table = 'global_mesyuarat';

    public function getMasaMesyuaratAttribute()
    {
    	return date('h:i a', strtotime($this->attributes['tarikh_mesyuarat']));
    }

    public function getTarikhMesyuaratAttribute()
    {
    	return date('d/m/Y', strtotime($this->attributes['tarikh_mesyuarat'])); 
    }
}
