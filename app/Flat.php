<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    public function society_members(){

    	return $this->belongsTo(SocietyMember::class);
    }

    public function tenant_name(){
    	return $this->belongsTo(Tenant::class);
    }
}
