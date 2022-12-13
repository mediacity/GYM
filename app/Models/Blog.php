<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
  use SoftDeletes;
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [
  	'title','detail','user_id','video','slug','uni_id','is_active','image','video','blog_cat_id','slug'
  ];
 public function user()
  {
		return $this->belongsTo('App\user','user_id');
  }
  public function category()
  {
    return $this->belongsTo('App\Models\BlogCategory','blog_cat_id');
  } 

}