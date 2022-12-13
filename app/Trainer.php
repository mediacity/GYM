<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Trainer extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'photo','trainer_name' ,'email','phone', 'dob' , 'address' , 'pincode', 'country_id' ,'state_id' , 'city_id', 'qualification','specialization', 'experience', 'trainer_limit' , 'type' ,'rating','is_active'
    ];
    public function state(){
        return $this->belongsTo('App\State','state_id','id');
    }
    public function country(){
        return $this->belongsTo('App\Country','country_id','id');
    }
    public function city(){
        return $this->belongsTo('App\City','city_id','id');
    }
    public function user(){
        return $this->hasMany('App\User','user_id','id');
    }
    public function trainerpackages(){
        return $this->belongsTo('App\Trainerpackages', 'id', 'id');
    }

    public function user_info(){
        return $this->belongsTo('App\User', 'trainer_name');
    }
}
