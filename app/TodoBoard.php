<?php

namespace App;

use App\TodoCard;
use Illuminate\Database\Eloquent\Model;

class TodoBoard extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'created_by', 'assigned_to', 'title', 'is_public', 'is_active',
    ];
     public function user()
    {
        return $this->belongsTo('\App\User', 'created_by');
    }
    public function todos()
    {
        return $this->hasMany('\App\Todo', 'board_id');
    }
    public function assignedto()
    {
        return $this->belongsTo('\App\User', 'assigned_to');
    }
     public function cards()
    {
        return $this->hasMany(TodoCard::class, 'board_id');
    }
}
