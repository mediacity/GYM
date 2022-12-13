<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Group extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'groups';
    public $timestamps = false;
    protected $fillable = [
    'name','detail','user_id','is_active'
    ];
    protected $casts=[
        'user_id' => 'array'
        ];
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
