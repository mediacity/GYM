<?php

namespace App;

use App\Todo;
use App\TodoBoard;
use Illuminate\Database\Eloquent\Model;

class TodoCard extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'name','detail','board_id'
    ];
    public function tasks(){
        return $this->hasMany(Todo::class,'card_id');
    }
    public function board(){
        return $this->belongsTo(TodoBoard::class,'board_id','id');
    }
}
