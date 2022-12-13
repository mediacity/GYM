<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Workoutplan extends Model
{
     use SoftDeletes;
     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'name' ,'goal_name','level_name','duration','days','note','is_active'
   ];
   public function goal(){
    return $this->belongsTo('App\Goal', 'id', 'id');
    }
    public function level(){
    return $this->belongsTo('App\Level', 'id', 'id');
}
}
