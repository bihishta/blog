<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Album extends Model
{
    protected $table = "albums";

    protected $fillable = array('user_id','name','description','cover_image');

    public function Photos(){
    	return $this->hasMany('App\Images', 'album_id');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function scopeSelf($query)
   	{
   		return $query->where('user_id', Auth::user()->id);
   	}
}
