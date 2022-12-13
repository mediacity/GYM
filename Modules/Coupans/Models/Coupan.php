<?php

namespace Modules\Coupans\Models;

use Illuminate\Database\Eloquent\Model;

class Coupan extends Model
{
    protected $fillable = [
        'code', 
        'distype', 
        'amount', 
        'maxusage', 
        'minamount', 
        'expirydate',
        'is_login', 
        'status'
    ];
}
