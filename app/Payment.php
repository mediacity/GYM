<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_id' ,'user_id', 'amount','package_id','to','from','name','mobile','email','status','payment_method'
   ];
   /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   public function user(){
    return $this->belongsTo('App\User', 'userid', 'id');
}
}
