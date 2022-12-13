<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Exercise extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [

        'exercise_package', 'session_id' , 'day' , 'exercisename' ,'detail', 'time' , 'video', 'trainer_id','is_active','url','followup_date'
    ];
    protected $casts=[
        'day' => 'array',
        'exercisename' => 'array',
        'session_id' => 'array'
    ];
    public function dietid(){
        return $this->belongsTo('App\Dietid', 'session_id', 'id');
    }
    public function exercisename(){
        return $this->belongsTo('App\Exercisename', 'exercisename', 'id');
    }
    public function day(){
        return $this->belongsTo('App\Day', 'day', 'id');
    }

   
}
