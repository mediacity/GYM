<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Trainerlist extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
         'user_id' , 'trainer_name' ,'personaltrainer' , 'description' , 'from' , 'to' , 'is_active'
        ];
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function trainer(){
        return $this->belongsTo('App\Trainer' , 'trainer_id' ,'id');
    }

}
