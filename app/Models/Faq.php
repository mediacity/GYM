<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{ 
    use SoftDeletes;    
    protected $table = 'faq';
    public $translatable = [  'title', 'details','status'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'title', 'details', 'status'];
    public function setFieldWithMutatorAttribute($value)
    {
        $this->attributes['field_with_mutator'] = $value;
    }
}

