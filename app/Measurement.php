<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Measurement extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'user_id' , 'height' ,'weight' , 'neck' ,'chest' , 'waist' ,'shoulder' , 'hips' ,'calves','abdomen',
        'muscle' ,'r_arm','l_arm','thigh_r','thigh_l','arm_circumference','tricep' ,'bicep', 'bmi' ,
         'fat', 'optimal_fat', 'date', 'description' , 'is_active','trainer_name'
    ];
    public function user(){
        return $this->belongsTo('App\User')->withDefault();
    }
    public function trainer(){
        return $this->belongsTo('App\Trainer', 'trainer_name', 'id');
    }
}
