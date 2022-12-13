<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Selectpages extends Model
{
    use SoftDeletes;
	protected $table = 'selectpages';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'title','page_id','is_active'
    ];
}
