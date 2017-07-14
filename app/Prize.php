<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    //
    public function challenges(){
        return $this->belongsToMany('App\Challenge');
    }
}
