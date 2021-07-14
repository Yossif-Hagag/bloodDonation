<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $table = "blood_types";
    protected $fillable = [
        'blood_id', 'bloodtype',
     
    ];
    public function users(){
        return $this->hasMany('App\User','blood_id');
    }
}
