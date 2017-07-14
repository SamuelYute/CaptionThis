<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'slug', 'start_date', 'end_date', 'sponsor','status'
    ];

    //
    public function pictures(){
        return $this->belongsToMany('App\Picture');
    }

    public function prizes(){
        return $this->belongsToMany('App\Prize');
    }
}
