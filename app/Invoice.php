<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'term_condition', 'name' , 'phone'  , 'email','signature','invoice_id'
    ];
    
}
