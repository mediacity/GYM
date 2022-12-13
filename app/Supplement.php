<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Supplement extends Model
{
    use SoftDeletes;
    protected $table = 'supplements';
    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
    'name','image','link','detail','price','offerprice','is_active'
    ];
}
