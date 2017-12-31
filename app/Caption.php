<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caption extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function picture()
    {
        return $this->belongsTo('App\Picture');
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
