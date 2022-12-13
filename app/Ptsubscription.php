<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ptsubscription extends Model
{
    protected $casts=[
        'issue' => 'array',
        
    ];
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'user_id' , 'email' ,'mobile' , 'phone' ,'occupation_id','dob','gender','line1','favourite_music','favourite_snack','issue','smoke','smoke_future','smoke_stop','medicine','medicine_describe'
        ,'injured','injured_describe','weight','dress_size','goal','feel','have','acheive_goals'
        ,'willing_work','motivation','family','friends','work','personal_trainer','activities','do_like','dont_like','previously_activities'
        ,'dolike','dontlike','cycle_rating','trainer_rating','tread_rating','stepper_rating','rower_rating'
        ,'exercise_average','extremly_hard','next_page','physical_activity','feel_pain','chest_pain','balance','joint','drugs','reason','body_composition','body_mass','skin_fold','endurance_testing','exercise_stress','max_testing','strength_endurance','strength_stability','strength_valuable','flexibility_test'
    ];
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function enquiryhealth(){
        return $this->belongsTo('App\Enquiryhealth', 'issue', 'id');
    }
}
