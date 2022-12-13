<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dietpackage extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
         'user_id','is_active','diet_package',
    ];
    protected $casts=[
        'diet_package' => 'array'
    ];
     public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id')->withDefault();
    }
    public function diet(){
        return $this->belongsTo('App\Diet', 'diet_package', 'id');
    }
}
