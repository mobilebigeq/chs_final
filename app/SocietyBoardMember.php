<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocietyBoardMember extends Model
{
    public function society_member_method(){

    	return $this->belongsTo(SocietyMember::class,'society_members_id');
    }
}
