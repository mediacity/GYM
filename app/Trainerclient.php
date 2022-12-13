<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Trainerclient extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'trainer_id', 'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
