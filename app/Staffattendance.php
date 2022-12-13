<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Staffattendance extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'user_id' , 'location' ,'attend' , 'date' ,'comment'
    ];
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
