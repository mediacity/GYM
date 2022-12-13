<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Goal extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'goal' , 'is_active',
    ];
    public function workoutplan(){
    return $this->belongsTo('App\Workoutplan', 'id', 'id');
}
}
