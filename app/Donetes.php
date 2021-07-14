<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donetes extends Model
{
    
    protected $table = "donetes";
    protected $fillable = [
        'id','post_id','user_id','created_at','updated_at' 
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
}
