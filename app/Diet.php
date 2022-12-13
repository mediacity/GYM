<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Diet extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
       'dietname', 'description', 'dietincludes', 'calories', 'day', 'session_id', 'is_active','image','followup_date'
    ];
    protected $casts=[
        'day' => 'array',
        'session_id' => 'array'
    ];
    public function dietid()
    {
        return $this->belongsTo('App\Dietid', 'session_id', 'id');
    }
    public function dietcontent()
     {
         return $this->hasMany('App\DietContent','content' ,'id');
     }
     public function diethascontent()
     {
         return $this->hasMany('App\DietHasContent','diet_id');
     }
      public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id')->withDefault();
    }
    public function day(){
        return $this->belongsTo('App\Day', 'day', 'id');
    }
}
