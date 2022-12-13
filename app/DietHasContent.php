<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DietHasContent extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'diet_id', 'content', 'calories', 'quantity',
     ];
     public function diet()
     {
         return $this->belongsTo('App\Diet','content' ,'id');
     }
}
