<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercisename extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
         'exercisename' , 'body_part' ,'type' ,'detail', 'is_active',
    ];
    protected $casts=[
        'type' => 'array',
    ];
    public function type(){
        return $this->belongsTo('App\Type', 'type', 'id');
    }
}