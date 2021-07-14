<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = "deliverys_tablee";
    protected $fillable = [
        'hospital_id', 'day', 'from', 'to',  'created_at','updated_at' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    
    public function hospialtodelivery(){
        return $this->belongsTo('App\Hospital','hospital_id','id');
    }
     
     
}
