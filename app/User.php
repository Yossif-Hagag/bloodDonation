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
     */protected $table = "users";
    protected $fillable = [
        'name', 'email', 'password','address' ,'birth_date','admin_id','phone', 'photo','disable','blood_id'
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
    public function admin(){
        return $this->belongsTo('App\Admin','admin_id');
    }
    public function hospial2(){
        return $this->hasMany('App\Donetes','user_id','id');
    }
    public function donetes(){
        return $this->belongsToMany('App\Post','donetes','user_id','post_id');
    }
    public function blood_types(){
        return $this->belongsTo('App\BloodType','blood_id');
    }
    public function orderU(){
        return $this->hasMany('App\Order','user_id','id');
    }
}
