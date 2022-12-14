<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AffilateHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'refer_user_id','log','user_id','amount','procces'
    ];

    public function fromRefered(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','refer_user_id','id')->withDefault();
    }
}
