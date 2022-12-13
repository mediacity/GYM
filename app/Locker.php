<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Locker extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'userid', 'lockerno' , 'to' , 'from' , 'is_active'
    ];
    
    public function user(){
        return $this->belongsTo('App\User', 'userid', 'id');
}
}
