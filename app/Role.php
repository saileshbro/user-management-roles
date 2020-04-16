<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public static $ADMIN = 'ADMIN';
    public static $AUTHOR = 'AUTHOR';
    public static $USER ='USER';
    public  function users(){
        return $this->belongsToMany(User::class);
    }
}
