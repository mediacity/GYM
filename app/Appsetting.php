<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appsetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title' ,'description','copyright','icon','logo', 'is_active',
   ];
}
