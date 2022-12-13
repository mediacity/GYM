<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class ManualPaymentMethod extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'payment_name', 'description', 'thumbnail', 'status',
    ];
}
