<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function challenges(){
        return $this->belongsToMany('App\Challenge');
    }

    public function votes(){
        return $this->hasMany('App\Vote');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    /*public function tags(){
        return $this->belongsToMany('App\Tag');
    }*/

    public function likes(){
      return $this->hasMany('App\Like');
    }

}
