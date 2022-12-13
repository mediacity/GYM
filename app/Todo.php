<?php

namespace App;

use App\Modules\TodoCard\Models\TodoCard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'created_by', 'board_id', 'card_id', 'task', 'remark', 'priority', 'assigned_on', 'is_complete', 'completed_on', 'is_checked', 'checked_on', 'is_active', 'due_on',
    ];
    public function user()
    {
        return $this->belongsTo('\App\User', 'created_by');
    }
    public function board()
    {
        return $this->belongsTo('\App\TodoBoard', 'board_id');
    }
    public function card(){
      return $this->belongsTo(TodoCard::class,'card_id','id');
    }
}
