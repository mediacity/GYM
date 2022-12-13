<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSubscription extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plan_id' , 'total_count','quantity','customer_notify','start_at','expire_by'
   ];
}

