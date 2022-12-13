<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dietcontent extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'calories', 'quantity', 'is_active',
    ];
    public function diet()
    {
        return $this->belongsTo('App\Diet', 'content', 'id');
    }
    public function diethascontent()
    {
        return $this->belongsTo('App\DietHasContent', 'content', 'id');
    }

}
