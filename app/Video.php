<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Video extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'id' ,'name', 'title', 'thumbnail', 'description', 'type', 'subtitle','sub_t', 'sub_lang', 'quality' , 'status', 'video',
    ];
}
