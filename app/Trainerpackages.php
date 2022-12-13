<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Trainerpackages extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
       'trainer_name', 'name','detail','duration','price','offerprice','stripe_id','sort','is_active'
    ];
    public function user(){
        return $this->belongsTo('App\User', 'userid', 'id');
}

}