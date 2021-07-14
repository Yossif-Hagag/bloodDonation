<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = [
        'orderTime', 'hospital_id', 'post_id', 'user_id',  'created_at','updated_at','status' 
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
        return $this->belongsTo('App\User','user_id','id');
    }  
    public function posts(){
        return $this->belongsTo('App\Post','post_id','id');
    }
    public function hospial(){
        return $this->belongsTo('App\Hospital','hospital_id','id');
    }
     
}
