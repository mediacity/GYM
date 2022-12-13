<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
use SoftDeletes;
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'link_by','image','url','heading','headingtextcolor','subheading','subheadingcolor','buttonname','btntextcolor','btnbgcolor','status',
    ];
}
  