<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function captions()
    {
        return $this->hasMany('App\Caption');
    }

    public function replies()
    {
        return $this->morphMany('App\Reply', 'replyable');
    }

    public function likes()
    {
        return $this->morphMany('App\Like', 'likable');
    }
}
