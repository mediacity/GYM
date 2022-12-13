<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Memberattendance extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'user_id' , 'location' ,'attend' , 'date' ,'comment','is_active','simran'
    ];
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
  
}
