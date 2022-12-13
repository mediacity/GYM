<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Exercisepackage extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [

        'user_id','is_active','exercise_package',
    ];
    protected $casts=[
        'exercise_package' => 'array'
    ];
     public function user(){
        return $this->belongsTo('App\User')->withDefault();
    }
    public function exercise(){
        return $this->belongsTo('App\Exercise', 'exercise_package', 'id');
    }
}
