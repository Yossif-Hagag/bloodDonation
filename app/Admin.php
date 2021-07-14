<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable 
{
    protected $table = "admins";
    protected $fillable = [
        'name', 'password', 'phone','email' ,'created_at','updated_at','photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function users(){
        return $this->hasMany('App\User','admin_id');
    }
    public function hospials(){
        return $this->hasMany('App\hospital','hospital_id');
    }
}
