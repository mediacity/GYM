<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Fees extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'fees';
    public $timestamps = false;
    protected $fillable = [
    'title','detail','price','offerprice','slug','sort','is_active'
    ];
}
