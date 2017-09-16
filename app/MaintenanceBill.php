<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceBill extends Model
{
    public function flats_method(){

    	return $this->belongsTo(Flat::class,'flat_id');
    }

    public function flats_method_no(){

    	return $this->belongsTo(Flat::class,'flat_id');
    }

}
