<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $table = "shared";

    protected $fillable = array('from_user', 'to_user', 'album_id');



}
