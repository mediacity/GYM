<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Halfmonth extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','note','reminder_date', 'status', 
        
    ];
     public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
