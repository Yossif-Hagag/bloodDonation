<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Hospital extends Authenticatable
{
    protected $table = "hospitals_create";
    protected $fillable = [
        'admin_id', 'post_id','hospital_id', 'password','name' ,'email','adress','type','created_at','updated_at','hosTime','photo','hasDelivery','disable'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',  
    ];
    public function admin(){
        return $this->belongsTo('App\Admin','admin_id');
    }
    public function post(){
        return $this->hasMany('App\Post','hospital_id');
    }
    public function delivery(){
        return $this->hasMany('App\Delivery','hospital_id');
    }
    public function orderH(){
        return $this->hasMany('App\Hospital','hospital_id','id');
    }
}
