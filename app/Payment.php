<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function bill(){
        return $this->hasOne('App\Bill');
    }
}
