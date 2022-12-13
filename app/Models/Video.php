<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
    protected $fillable = [
        'id' ,'name', 'title', 'thumbnail', 'description', 'type', 'subtitle','sub_t', 'sub_lang', 'quality' , 'status', 'video',
    ];
}
