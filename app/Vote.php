<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //
    public function user(){
        $this->belongsTo('App\User');
    }

    public function picture(){
        return $this->belongsTo('App\Picture');
    }

    public function challenge(){
        return $this->belongsTo('App\Challenge');
    }
}
