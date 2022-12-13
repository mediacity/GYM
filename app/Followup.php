<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
         'description', 'status' , 'date' ,'enquiry_name',
    ];
}
