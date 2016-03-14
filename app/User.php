<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];
    protected $table = "users";

    public function album(){
        return $this->hasMany('App\Album');
    }

 

    // public function studnet(){
    //     return $this->hasOne('App\Student');
    // }

    // public function teacher(){
    //     return $this->hasOne('App\Teacher');
    // }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    


//    public function articles(){
//        return $this->hasMany('App\Article');
//    }


}
