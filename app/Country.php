<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iso',
        'nicename',
        'name',
        'iso3',
        'numcode',
        'phonecode'
    ];
    public function states(){
        return $this->hasMany('App\State','country_id');
    }
}
