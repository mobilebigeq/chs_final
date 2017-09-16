<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

   public function maintenance_bill(){

        return $this->belongsTo(MaintenanceBill::class);
    }
}
