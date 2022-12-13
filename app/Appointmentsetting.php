<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointmentsetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'slot',
    ];

    protected $casts=[
        'slot' => 'array'       
    ];
}

