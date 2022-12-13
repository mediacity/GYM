<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Affilates extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ref_id', 'per_referral' ,'min_readme' ,'status'
    ];
}
