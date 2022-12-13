<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Packages extends Model
{
    use SoftDeletes;
    protected $table = 'packages';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public $timestamps = false;
    protected $fillable = [
    'title','detail','duration','price','offerprice','stripe_id','sort','is_active'
    ];
}
