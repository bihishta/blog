<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = "images";

    protected $fillable = array('album_id','description','name');

    public function album(){
    	return $this->belongsTo('App\Album');
    }
}
