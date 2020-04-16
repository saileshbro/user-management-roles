<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public  function roles(){
        return $this->belongsToMany(Role::class);
    }


    /**
     * @param array $roles
     * @return bool
     */
    public function hasAnyRoles($roles){
        if($this->roles()->whereIn('name',$roles)->get()->count()){
            return true;
        }
        return false;
    }

    /**
     * @param string $role
     * @return bool
     */
    public function hasRole($role){
        if($this->roles()->where('name',$role)->get()->count()){
            return true;
        }
        return false;
    }
    public function isAdmin(){
        return $this->hasRole(Role::$ADMIN);
    }
}
