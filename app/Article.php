<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function purchases(){
        return $this->belongsToMany('App\Purchase');
    }

    public function artist(){
        return $this->belongsTo('App\Artist');
    }

    public function order(){
        return $this->hasOne('App\Order');
    }

    public function genres(){
        return $this->belongsToMany('App\Genre');
    }
}
